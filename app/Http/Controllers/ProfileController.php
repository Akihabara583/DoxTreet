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

class ProfileController extends Controller
{
    /**
     * Show the user's profile dashboard.
     */
    public function show(): View
    {
        return view('profile.show');
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
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

    /**
     * Display the user's document history.
     */
    public function history(): View
    {
        $documents = GeneratedDocument::where('user_id', Auth::id())
            ->with('template')
            ->latest()
            ->paginate(10);

        return view('profile.history', [
            'documents' => $documents,
        ]);
    }

    /**
     * --- ФИНАЛЬНЫЙ РАБОЧИЙ КОД ---
     *
     * @param string $locale Язык из URL.
     * @param string $document ID документа из URL.
     * @return RedirectResponse
     */
    public function reuse(string $locale, string $document): RedirectResponse
    {
        // 1. Находим документ в базе данных. Если его нет, Laravel выдаст ошибку 404.
        $documentModel = GeneratedDocument::findOrFail($document);

        // 2. Убеждаемся, что документ принадлежит текущему пользователю.
        if ($documentModel->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // 3. Получаем связанный с ним шаблон.
        $template = $documentModel->template;

        // 4. Проверяем, что шаблон существует (его могли удалить).
        if (!$template) {
            return redirect()->route('profile.history', ['locale' => $locale])
                ->with('error', 'Этот шаблон больше недоступен.');
        }

        // 5. Перенаправляем пользователя на страницу шаблона для повторного заполнения.
        return redirect()->route('templates.show', [
            'locale' => $locale,
            'template' => $template->slug, // Используем slug для поиска, как настроено в модели Template
            'data' => $documentModel->data
        ]);
    }

    /**
     * Show the form for editing the user's personal details.
     */
    public function myData(): View
    {
        $details = Auth::user()->details ?? new UserDetail();
        return view('profile.my-data', ['details' => $details]);
    }

    /**
     * Update the user's personal details.
     */
    public function updateMyData(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'full_name_nominative' => 'nullable|string|max:255',
            'full_name_genitive' => 'nullable|string|max:255',
            'address_registered' => 'nullable|string|max:255',
            'address_factual' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'tax_id_number' => 'nullable|string|max:255',
            'passport_series' => 'nullable|string|max:10',
            'passport_number' => 'nullable|string|max:20',
            'passport_issuer' => 'nullable|string|max:255',
            'passport_date' => 'nullable|date',
        ]);

        Auth::user()->details()->updateOrCreate(
            ['user_id' => Auth::id()],
            $validatedData
        );

        return redirect()->route('profile.my-data', app()->getLocale())->with('status', 'details-updated');
    }
}
