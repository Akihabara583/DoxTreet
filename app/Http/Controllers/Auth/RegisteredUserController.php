<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Notifications\SendVerificationCode;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class RegisteredUserController extends Controller
{
    /**
     * Показать форму регистрации.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Обработать входящий запрос на регистрацию.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Валидация данных, но правило 'unique' для email убрано,
        // так как мы будем проверять его вручную.
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Ищем пользователя по email, включая "мягко удаленных"
        $existingUser = User::withTrashed()->where('email', $request->email)->first();

        // 3. Если пользователь существует и он АКТИВЕН, возвращаем стандартную ошибку валидации.
        if ($existingUser && !$existingUser->trashed()) {
            return back()->withInput($request->only('name', 'email'))
                ->withErrors(['email' => __('validation.unique', ['attribute' => 'email'])]);
        }

        // Если мы дошли до сюда, значит это либо новый пользователь, либо "удаленный".
        // В обоих случаях можно отправлять код верификации.

        Log::info('Validation passed for pre-registration', ['email' => $request->email]);

        try {
            $code = random_int(100000, 999999);

            // Подготавливаем данные для сессии
            $sessionData = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'verification_code' => $code,
                'expires_at' => Carbon::now()->addMinutes(10)
            ];

            // 4. КЛЮЧЕВОЕ ИЗМЕНЕНИЕ: Если мы нашли "удаленного" пользователя,
            // добавляем его ID в сессию. Контроллер верификации должен будет
            // восстановить его, а не создавать нового.
            if ($existingUser && $existingUser->trashed()) {
                $sessionData['restore_user_id'] = $existingUser->id;
                Log::info('Preparing to restore soft-deleted user.', ['email' => $request->email, 'user_id' => $existingUser->id]);
            }

            Session::put('registration_data', $sessionData);
            Log::info('Registration data stored in session', ['email' => $request->email]);

            Notification::route('mail', $request->email)
                ->notify(new SendVerificationCode($code));
            Log::info('Verification email sent to', ['email' => $request->email]);

            return redirect()->route('verification.code.form', ['locale' => app()->getLocale()])
                ->with('status', __('messages.verification_sent'));

        } catch (\Exception $e) {
            Log::error('Pre-registration process failed', [
                'email' => $request->email,
                'error' => $e->getMessage()
            ]);

            return back()->with('error', __('messages.registration_error'));
        }
    }
}
