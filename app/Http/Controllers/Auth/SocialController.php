<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
// ✅ ИСПРАВЛЕНИЕ 1: Добавляем импорт ответа Symfony
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

class SocialController extends Controller
{
    /**
     * Redirect the user to the Provider authentication page.
     */
    // ✅ ИСПРАВЛЕНИЕ 2: Меняем тип возвращаемого значения
    public function redirect(string $provider): SymfonyRedirectResponse
    {
        if (!in_array($provider, ['google', 'facebook'])) {
            abort(404);
        }
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Provider.
     */
    public function callback(string $provider): RedirectResponse
    {
        if (!in_array($provider, ['google', 'facebook'])) {
            abort(404);
        }

        try {
            $socialUser = Socialite::driver($provider)->user();

            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName(),
                    'provider_name' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'password' => Hash::make(Str::random(24)),
                    'subscription_plan' => 'base',
                    'email_verified_at' => now(),
                ]
            );

            Auth::login($user);

            return redirect()->intended(route('home', ['locale' => app()->getLocale()]));

        } catch (Exception $e) {
            Log::error("Socialite callback error for {$provider}: " . $e->getMessage());
            return redirect()->route('login', ['locale' => app()->getLocale()])
                ->with('error', 'Не удалось войти через ' . ucfirst($provider) . '. Пожалуйста, попробуйте еще раз.');
        }
    }
}
