<?php

namespace App\Livewire;

use App\Models\DocumentBundle;
use App\Models\Template;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use ZipArchive;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\ValidationException;

class DocumentBundleWizard extends Component
{
    public DocumentBundle $bundle;
    public array $templates = [];
    public array $formData = [];
    public array $skippedSteps = [];
    public int $currentStep = 1;
    public int $totalSteps = 0;
    public string $sessionKey;

    public function mount(DocumentBundle $bundle)
    {


        if (auth()->check() && !auth()->user()->canAccessBundle($bundle)) {
            abort(403, 'You do not have permission to access this document bundle.');
        }

        $this->bundle = $bundle;
        $this->templates = $this->bundle->templates()->where('is_active', true)->get()->map(function ($template) {
            return [
                'id' => $template->id,
                'title' => $template->title,
                'description' => $template->description,
                'fields' => $template->fields,
                'pivot' => $template->pivot->toArray(),
            ];
        })->toArray();
        $this->totalSteps = count($this->templates);
        $this->sessionKey = 'bundle_wizard_' . $this->bundle->id;

        $this->loadStateFromSession();
    }

    public function render()
    {
        return view('livewire.document-bundle-wizard');
    }

    public function loadStateFromSession()
    {
        if (session()->has($this->sessionKey)) {
            $sessionData = session($this->sessionKey);
            $this->formData = $sessionData['formData'] ?? [];
            $this->currentStep = $sessionData['currentStep'] ?? 1;
            $this->skippedSteps = $sessionData['skippedSteps'] ?? [];
        } else {
            $this->prefillFromProfile();
            $this->saveStateToSession();
        }
    }

    private function saveStateToSession()
    {
        session([$this->sessionKey => [
            'formData' => $this->formData,
            'currentStep' => $this->currentStep,
            'skippedSteps' => $this->skippedSteps,
        ]]);
    }

    public function updated($propertyName)
    {
        $this->saveStateToSession();
    }

    public function nextStep()
    {
        // ✅ ІЗМЕНЕНИЕ: Прибираємо блок try...catch, щоб дозволити
        // Livewire автоматично обробляти помилки валідації.
        if (!in_array($this->currentStep, $this->skippedSteps)) {
            $this->validateStep($this->currentStep);
        }

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
            $this->saveStateToSession();
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
            $this->saveStateToSession();
        }
    }

    public function submit()
    {
        if (!auth()->check()) {
            // Вручную говорим Laravel: "Запомни эту страницу!"
            session(['url.intended' => url()->previous()]);

            return redirect()->route('login');
        }
        try {
            foreach ($this->templates as $index => $template) {
                $step = $index + 1;
                if (!in_array($step, $this->skippedSteps)) {
                    $this->validateStep($step);
                }
            }
        } catch (ValidationException $e) {
            $this->dispatch('validation-error', 'Пожалуйста, проверьте все шаги на наличие ошибок.');
            return;
        }

        $tempDir = 'temp_bundles';
        $zipFileName = Str::slug($this->bundle->title) . '_' . time() . '.zip';
        $relativePath = $tempDir . DIRECTORY_SEPARATOR . $zipFileName;
        $absoluteZipPath = Storage::disk('local')->path($relativePath);

        $zip = new ZipArchive();
        if ($zip->open($absoluteZipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
            session()->flash('error', 'Не удалось создать ZIP-архив.');
            return;
        }

        $countryCode = $this->bundle->country_code;
        $locale = ($countryCode === 'UA') ? 'uk' : strtolower($countryCode);

        app()->setLocale($locale);

        foreach ($this->templates as $index => $templateData) {
            $step = $index + 1;
            if (in_array($step, $this->skippedSteps)) {
                continue;
            }

            $templateModel = Template::find($templateData['id']);
            if (!$templateModel) continue;

            $translation = $templateModel->translations()->where('locale', $locale)->first();
            if (!$translation) {
                $translation = $templateModel->translations()->where('locale', 'en')->first();
            }
            if (!$translation) {
                $translation = $templateModel->translations()->first();
            }
            if (!$translation) {
                Log::warning("No translations found for template ID: {$templateModel->id}");
                continue;
            }

            $fullHtml = ($translation->header_html ?? '') . ($translation->body_html ?? '') . ($translation->footer_html ?? '');
            $fullHtml = $this->replacePlaceholders($fullHtml, $this->formData);

            $pdfFileName = Str::slug($templateData['title'] ?: "document-{$step}") . '.pdf';
            $pdfContent = Pdf::loadHTML($fullHtml)->setOptions(['defaultFont' => 'DejaVu Sans'])->output();

            $zip->addFromString($pdfFileName, $pdfContent);
        }

        $zip->close();

        $downloadResponse = Storage::disk('local')->download($relativePath, $zipFileName);

        session()->forget($this->sessionKey);
        session()->save();

        $this->formData = [];
        $this->skippedSteps = [];
        $this->currentStep = 1;
        $this->prefillFromProfile();

        return $downloadResponse;
    }

    private function validateStep(int $step)
    {
        $template = $this->templates[$step - 1];
        $rules = [];
        $attributeNames = [];
        $locale = app()->getLocale();
        $fields = $template['fields'] ?? [];

        foreach ($fields as $field) {
            $fieldName = 'formData.' . $field['name'];
            $rule = [];
            if (!empty($field['required'])) {
                $rule[] = 'required';
            } else {
                $rule[] = 'nullable';
            }
            if (($field['type'] ?? 'text') === 'email') {
                $rule[] = 'email';
            }
            $rules[$fieldName] = implode('|', $rule);
            $attributeNames[$fieldName] = $field['labels'][$locale] ?? $field['name'];
        }

        $this->validate($rules, [], $attributeNames);
    }

    private function replacePlaceholders(?string $html, array $data): string
    {
        if (!$html) return '';
        foreach ($data as $key => $value) {
            $html = str_replace("[[{$key}]]", e($value ?? ''), $html);
        }
        $pattern = '/\[\[([a-zA-Z0-9_]+)\]\](.*?)\[\[\/\1\]\]/s';
        $html = preg_replace_callback($pattern, function ($matches) use ($data) {
            return (isset($data[$matches[1]]) && !empty($data[$matches[1]])) ? $matches[2] : '';
        }, $html);
        return preg_replace('/\[\[.*?\]\]/s', '', $html);
    }

    private function prefillFromProfile()
    {
        if (Auth::check() && Auth::user()->details) {
            $user = Auth::user();
            $details = $user->details;

            foreach ($this->templates as $template) {
                foreach ($template['fields'] as $field) {
                    $fieldName = $field['name'];
                    if (!isset($this->formData[$fieldName])) {
                        $this->formData[$fieldName] = null;
                    }
                }
            }
        }
    }
}
