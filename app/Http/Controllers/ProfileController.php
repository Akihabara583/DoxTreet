<?php

namespace App\Http\Controllers;

use App\Models\GeneratedDocument;
use App\Models\UserDetail; // Добавляем модель UserDetail
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    /**
     * Show the user's profile dashboard.
     */
    public function show()
    {
        return view('profile.show');
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
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
    public function history()
    {
        $documents = GeneratedDocument::where('user_id', Auth::id())
            ->with('template.translation')
            ->latest()
            ->paginate(10);

        return view('profile.history', [
            'documents' => $documents,
        ]);
    }

    /**
     * Reuse an old document's data.
     *
     * ФИНАЛЬНОЕ ИСПРАВЛЕНИЕ:
     * Вместо того чтобы принимать объект, мы принимаем строку с ID ($documentId) из URL.
     * Затем мы находим документ в базе данных вручную.
     * Это решает проблему, обходя неработающий Route Model Binding.
     */
    public function reuse(string $documentId)
    {
        // 1. Находим документ вручную или выбрасываем ошибку 404, если его нет.
        $document = GeneratedDocument::findOrFail($documentId);

        // 2. Убеждаемся, что пользователь может использовать только свои документы.
        if ($document->user_id !== Auth::id()) {
            abort(403); // Ошибка "Доступ запрещен"
        }

        // 3. Перенаправляем на страницу шаблона с GET-параметрами.
        return redirect()->route('templates.show', [
            'locale' => app()->getLocale(),
            'template' => $document->template->slug,
            'data' => $document->data
        ]);
    }


    // --- НОВЫЕ МЕТОДЫ, КОТОРЫЕ БЫЛИ ДОБАВЛЕНЫ ---

    /**
     * Show the form for editing the user's personal details.
     */
    public function myData()
    {
        // Находим данные пользователя или создаем новый пустой объект
        $details = Auth::user()->details ?? new UserDetail();

        return view('profile.my-data', [
            'details' => $details,
        ]);
    }

    /**
     * Update the user's personal details.
     */
    public function updateMyData(Request $request)
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

        // Используем updateOrCreate, чтобы создать запись, если ее нет, или обновить, если есть
        Auth::user()->details()->updateOrCreate(
            ['user_id' => Auth::id()], // Условие для поиска
            $validatedData // Данные для обновления или создания
        );

        return redirect()->route('profile.my-data', app()->getLocale())->with('status', 'details-updated');
    }
}
