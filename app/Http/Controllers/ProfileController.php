<?php

namespace App\Http\Controllers;

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

class ProfileController extends Controller
{
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

    public function reuse(string $locale, string $document): RedirectResponse
    {
        $documentModel = GeneratedDocument::with(['template', 'userTemplate'])->findOrFail($document);

        if ($documentModel->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($documentModel->template) {
            return redirect()->route('documents.show', [
                'locale' => $locale,
                'countryCode' => $documentModel->template->country_code,
                'templateSlug' => $documentModel->template->slug,
                'data' => $documentModel->data
            ]);
        }

        if ($documentModel->userTemplate) {
            return redirect()->route('profile.my-templates.show', [
                'locale' => $locale,
                'userTemplate' => $documentModel->userTemplate->id,
                'data' => $documentModel->data
            ]);
        }

        return redirect()->route('profile.history', ['locale' => $locale])
            ->with('error', __('messages.template_deleted'));
    }

    // --- НАЧАЛО НОВЫХ МЕТОДОВ ДЛЯ ИСТОРИИ ДОКУМЕНТОВ ---
    public function deleteSelectedGeneratedDocuments(Request $request): RedirectResponse
    {
        $request->validate(['documents' => 'required|array']);
        $documentIds = $request->input('documents');

        GeneratedDocument::where('user_id', Auth::id())
            ->whereIn('id', $documentIds)
            ->delete();

        return redirect()->back()->with('status', 'Выбранные документы были удалены.');
    }

    public function deleteAllGeneratedDocuments(): RedirectResponse
    {
        GeneratedDocument::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('status', 'Вся история документов была очищена.');
    }
    // --- КОНЕЦ НОВЫХ МЕТОДОВ ---

    public function myData(): View
    {
        $details = Auth::user()->details()->firstOrNew([
            'user_id' => Auth::id()
        ]);
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

        Auth::user()->details()->updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedData
        );

        return redirect()->route('profile.my-data', app()->getLocale())->with('status', 'details-updated');
    }

    public function signedDocumentsHistory(): View
    {
        $signedDocuments = SignedDocument::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('profile.signed_history', [
            'documents' => $signedDocuments,
        ]);
    }

    public function downloadSignedDocument(string $locale, string $document): BinaryFileResponse
    {
        $documentModel = SignedDocument::findOrFail($document);

        if (auth()->id() !== $documentModel->user_id) {
            abort(403, 'This action is unauthorized.');
        }

        $filePath = storage_path('app/public/' . $documentModel->signed_file_path);

        if (!file_exists($filePath)) {
            abort(404, 'Файл не найден.');
        }

        return response()->download($filePath, $documentModel->original_filename);
    }

    public function deleteSelectedSignedDocuments(Request $request): RedirectResponse
    {
        $request->validate(['documents' => 'required|array']);
        $documentIds = $request->input('documents');

        $documentsToDelete = SignedDocument::where('user_id', Auth::id())
            ->whereIn('id', $documentIds)
            ->get();

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
}
