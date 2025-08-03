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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Log::info('Validation passed for pre-registration', ['email' => $request->email]);

        try {
            $code = random_int(100000, 999999);

            Session::put('registration_data', [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'verification_code' => $code,
                'expires_at' => Carbon::now()->addMinutes(10)
            ]);
            Log::info('Registration data stored in session', ['email' => $request->email]);

            Notification::route('mail', $request->email)
                ->notify(new SendVerificationCode($code));
            Log::info('Verification email sent to', ['email' => $request->email]);

            // ✅ ИЗМЕНЕНИЕ: Используем ключ перевода
            return redirect()->route('verification.code.form', ['locale' => app()->getLocale()])
                ->with('status', __('messages.verification_sent'));

        } catch (\Exception $e) {
            Log::error('Pre-registration process failed', [
                'email' => $request->email,
                'error' => $e->getMessage()
            ]);

            // ✅ ИЗМЕНЕНИЕ: Используем ключ перевода
            return back()->with('error', __('messages.registration_error'));
        }
    }
}
