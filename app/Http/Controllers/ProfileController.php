<?php

// Файл: app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

// ИЗМЕНЕНИЕ №1: Добавляем трейт для авторизации
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\GeneratedDocument;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\SignedDocument;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // ИЗМЕНЕНИЕ №2: Подключаем трейт в класс
    use AuthorizesRequests;

    public function show(): View
    {
        return view('profile.show');
    }

    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit', app()->getLocale())->with('status', 'profile-updated');
    }

    public function history(): View
    {
        $documents = GeneratedDocument::where('user_id', Auth::id())
            ->with(['template', 'userTemplate'])
            ->latest()
            ->paginate(10);

        return view('profile.history', [
            'documents' => $documents,
        ]);
    }

    // ИЗМЕНЕНИЕ №3: Используем Route Model Binding и Policy
    public function reuse(Request $request, string $locale, GeneratedDocument $document): RedirectResponse
    {
        $this->authorize('view', $document);

        if ($document->template) {
            return redirect()->route('documents.show', [
                'locale' => $locale,
                'countryCode' => $document->template->country_code,
                'templateSlug' => $document->template->slug,
                'data' => $document->data
            ]);
        }

        if ($document->userTemplate) {
            return redirect()->route('profile.my-templates.show', [
                'locale' => $locale,
                'userTemplate' => $document->userTemplate->id,
                'data' => $document->data
            ]);
        }

        return redirect()->route('profile.history', ['locale' => $locale])
            ->with('error', __('messages.template_deleted'));
    }

    public function deleteSelectedGeneratedDocuments(Request $request): RedirectResponse
    {
        $request->validate(['documents' => 'required|array']);
        $documentIds = $request->input('documents');
        GeneratedDocument::where('user_id', Auth::id())->whereIn('id', $documentIds)->delete();
        return redirect()->back()->with('status', 'Выбранные документы были удалены.');
    }

    public function deleteAllGeneratedDocuments(): RedirectResponse
    {
        GeneratedDocument::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('status', 'Вся история документов была очищена.');
    }

    public function myData(): View
    {
        $details = Auth::user()->details()->firstOrNew(['user_id' => Auth::id()]);
        return view('profile.my-data', ['details' => $details]);
    }

    public function updateMyData(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'full_name_nominative' => 'nullable|string|max:255',
            'full_name_genitive'   => 'nullable|string|max:255',
            'address_registered'   => 'nullable|string|max:255',
            'address_factual'      => 'nullable|string|max:255',
            'phone_number'         => 'nullable|string|max:255',
            'tax_id_number'        => 'nullable|string|max:255',
            'passport_series'      => 'nullable|string|max:10',
            'passport_number'      => 'nullable|string|max:20',
            'passport_issuer'      => 'nullable|string|max:255',
            'passport_date'        => 'nullable|date',
            'id_card_number'       => 'nullable|string|max:255',
            'position'             => 'nullable|string|max:255',
            'contact_email'        => 'nullable|email|max:255',
            'website'              => 'nullable|url|max:255',
            'legal_entity_name'    => 'nullable|string|max:255',
            'legal_entity_address' => 'nullable|string|max:255',
            'legal_entity_tax_id'  => 'nullable|string|max:255',
            'represented_by'       => 'nullable|string|max:255',
            'bank_name'            => 'nullable|string|max:255',
            'bank_iban'            => 'nullable|string|max:255',
        ]);

        Auth::user()->details()->updateOrCreate(['user_id' => Auth::id()], $validatedData);
        return redirect()->route('profile.my-data', app()->getLocale())->with('status', 'details-updated');
    }

    public function signedDocumentsHistory(): View
    {
        $signedDocuments = SignedDocument::where('user_id', Auth::id())->latest()->paginate(10);
        return view('profile.signed_history', ['documents' => $signedDocuments]);
    }

    // ИЗМЕНЕНИЕ №4: Используем Route Model Binding и Policy
    public function downloadSignedDocument(Request $request, string $locale, SignedDocument $document)
    {
        $this->authorize('view', $document);

        $user = $request->user();
        if (!$user->canPerformAction('download')) {
            return back()->with('error', 'Ваш дневной лимит на скачивание документов исчерпан.');
        }

        $filePath = storage_path('app/public/' . $document->signed_file_path);
        if (!file_exists($filePath)) {
            abort(404, 'Файл не найден.');
        }

        $user->decrementLimit('download');
        return response()->download($filePath, $document->original_filename);
    }

    public function deleteSelectedSignedDocuments(Request $request): RedirectResponse
    {
        $request->validate(['documents' => 'required|array']);
        $documentIds = $request->input('documents');
        $documentsToDelete = SignedDocument::where('user_id', Auth::id())->whereIn('id', $documentIds)->get();
        foreach ($documentsToDelete as $document) {
            Storage::disk('public')->delete($document->signed_file_path);
        }
        SignedDocument::destroy($documentsToDelete->pluck('id'));
        return redirect()->back()->with('status', 'Выбранные документы были удалены.');
    }

    public function deleteAllSignedDocuments(): RedirectResponse
    {
        $documentsToDelete = SignedDocument::where('user_id', Auth::id())->get();
        foreach ($documentsToDelete as $document) {
            Storage::disk('public')->delete($document->signed_file_path);
        }
        SignedDocument::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('status', 'Все ваши подписанные документы были удалены.');
    }

    public function subscription(): View
    {
        $user = Auth::user();
        $user->checkAndResetLimits();
        return view('profile.subscription', ['user' => $user]);
    }

    public function cancelSubscription(Request $request): RedirectResponse
    {
        $user = $request->user();

        if (!$user->gumroad_subscriber_id) {
            return back()->with('error', __('messages.sub_cancel_fail_not_found'));
        }

        $accessToken = env('GUMROAD_ACCESS_TOKEN');
        if (!$accessToken) {
            Log::error('GUMROAD_ACCESS_TOKEN не установлен в .env');
            return back()->with('error', __('messages.sub_cancel_fail_server_error'));
        }

        try {
            $response = Http::withToken($accessToken)->delete(
                "https://api.gumroad.com/v2/subscribers/{$user->gumroad_subscriber_id}"
            );

            if ($response->successful()) {
                $user->gumroad_subscriber_id = null;
                $user->save();
                return back()->with('success', __('messages.sub_cancel_success'));
            }

            Log::error('Ошибка отмены подписки Gumroad', [
                'user_id' => $user->id,
                'status' => $response->status(),
                'response' => $response->json()
            ]);
            return back()->with('error', __('messages.sub_cancel_fail_api_error'));

        } catch (\Exception $e) {
            Log::error('Исключение при отмене подписки Gumroad', [
                'user_id' => $user->id,
                'exception_message' => $e->getMessage()
            ]);
            return back()->with('error', __('messages.sub_cancel_fail_api_error'));
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Добавляем сообщение в сессию для отображения после редиректа
        return Redirect::to('/' . app()->getLocale())->with('status', 'account-deleted');
    }
}
