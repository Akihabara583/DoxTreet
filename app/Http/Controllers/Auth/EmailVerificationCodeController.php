<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;

class EmailVerificationCodeController extends Controller
{
    /**
     * Показать форму для ввода кода.
     */
    public function showVerificationForm()
    {
        if (!Session::has('registration_data')) {
            Log::warning('Attempt to access verification page without session data.');
            return redirect()->route('register', ['locale' => app()->getLocale()]);
        }
        return view('auth.verify-code');
    }

    /**
     * Проверить введенный код и создать или восстановить пользователя.
     */
    public function verifyCode(Request $request)
    {
        $request->validate(['code' => 'required|string|digits:6']);

        $regData = Session::get('registration_data');

        if (!$regData) {
            return redirect()->route('register', ['locale' => app()->getLocale()])->with('error', __('messages.session_expired'));
        }

        if (Carbon::now()->gt($regData['expires_at'])) {
            Session::forget('registration_data');
            return redirect()->route('register', ['locale' => app()->getLocale()])->with('error', __('messages.code_expired'));
        }

        if ($regData['verification_code'] != $request->code) {
            return back()->withErrors(['code' => __('messages.invalid_code')]);
        }

        $user = null;

        try {
            // ✅ НАЧАЛО: КЛЮЧЕВОЕ ИЗМЕНЕНИЕ
            // Проверяем, нужно ли восстановить пользователя
            if (isset($regData['restore_user_id'])) {

                // Ищем "удаленного" пользователя по ID
                $user = User::withTrashed()->find($regData['restore_user_id']);

                if ($user) {
                    // Восстанавливаем пользователя
                    $user->restore();
                    // Обновляем его данные (имя и новый пароль)
                    $user->forceFill([
                        'name' => $regData['name'],
                        'password' => $regData['password'],
                        'email_verified_at' => Carbon::now(), // Можно также обновить дату верификации
                    ])->save();
                    Log::info('User restored successfully after verification.', ['user_id' => $user->id, 'email' => $user->email]);
                } else {
                    // На всякий случай, если пользователя не удалось найти
                    throw new \Exception('Soft-deleted user not found for restoration.');
                }

            } else {
                // Если это новый пользователь, создаем его, как и раньше
                $user = User::create([
                    'name' => $regData['name'],
                    'email' => $regData['email'],
                    'password' => $regData['password'],
                    'email_verified_at' => Carbon::now(),
                    'subscription_plan' => 'base',
                ]);
                Log::info('User created successfully after verification.', ['user_id' => $user->id, 'email' => $user->email]);

                // Событие Registered вызываем только для действительно новых пользователей
                event(new Registered($user));
            }
            // ✅ КОНЕЦ: КЛЮЧЕВОЕ ИЗМЕНЕНИЕ

        } catch (\Exception $e) {
            Log::error('Failed to create or restore user after verification', [
                'email' => $regData['email'],
                'error' => $e->getMessage()
            ]);
            Session::forget('registration_data');
            return redirect()->route('register', ['locale' => app()->getLocale()])->with('error', __('messages.account_creation_error'));
        }

        Session::forget('registration_data');
        Auth::login($user);

        return redirect()->intended(route('home', ['locale' => app()->getLocale()]));
    }
}
