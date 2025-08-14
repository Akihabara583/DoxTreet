<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SubscriptionService
{
    /**
     * @var array
     */
    protected const PLANS = [
        'base' => [
            'daily_template_limit' => 2,
            'daily_signature_limit' => 1,
            'daily_download_limit' => 2,
            'custom_template_limit' => 0,
        ],
        'standard' => [
            'daily_template_limit' => 20,
            'daily_signature_limit' => 20,
            'daily_download_limit' => 20,
            'custom_template_limit' => 0,
        ],
        'pro' => [
            'daily_template_limit' => 50,
            'daily_signature_limit' => 50,
            'daily_download_limit' => 50,
            'custom_template_limit' => 10,
        ],
    ];

    public function assignPlan(User $user, string $planName, ?int $days): void
    {
        if (!isset(self::PLANS[$planName])) {
            return;
        }

        $planSettings = self::PLANS[$planName];

        $expiresAt = ($planName !== 'base' && !is_null($days))
            ? Carbon::now()->addDays($days)
            : null;

        $user->update([
            'subscription_plan' => $planName,
            'subscription_expires_at' => $expiresAt,
            'daily_template_limit' => $planSettings['daily_template_limit'],
            'daily_signature_limit' => $planSettings['daily_signature_limit'],
            'daily_download_limit' => $planSettings['daily_download_limit'],
            'custom_template_limit' => $planSettings['custom_template_limit'],
            'templates_left' => $planSettings['daily_template_limit'],
            'signatures_left' => $planSettings['daily_signature_limit'],
            'downloads_left' => $planSettings['daily_download_limit'],
            'custom_templates_left' => $planSettings['custom_template_limit'],
            'limits_reset_at' => Carbon::today(),
        ]);
    }

    public function cancel(User $user): bool
    {
        if (!$user->gumroad_subscriber_id) {
            Log::info("Попытка отменить подписку для пользователя {$user->id}, но gumroad_subscriber_id отсутствует. Считаем успехом.");
            return true;
        }

        // ✅ ИСПРАВЛЕНИЕ: Используем config() вместо env()
        $accessToken = config('services.gumroad.access_token');
        if (!$accessToken) {
            Log::error('GUMROAD_ACCESS_TOKEN не установлен в config/services.php. Невозможно отменить подписку.');
            return false;
        }

        Log::info("Начинаем отмену подписки Gumroad для пользователя {$user->id} с ID подписчика: {$user->gumroad_subscriber_id}");

        try {
            $response = Http::withToken($accessToken)->delete(
                "https://api.gumroad.com/v2/subscribers/{$user->gumroad_subscriber_id}"
            );

            if ($response->successful()) {
                $user->gumroad_subscriber_id = null;
                $user->subscription_plan = 'base';
                $user->subscription_expires_at = null;
                $user->save();
                Log::info("Подписка для пользователя {$user->id} успешно отменена через API Gumroad.");
                return true;
            }

            Log::error('Ошибка отмены подписки Gumroad. API вернул ошибку.', [
                'user_id' => $user->id,
                'status' => $response->status(),
                'response' => $response->json()
            ]);
            return false;

        } catch (\Exception $e) {
            Log::error('Исключение при отмене подписки Gumroad.', [
                'user_id' => $user->id,
                'exception_message' => $e->getMessage()
            ]);
            return false;
        }
    }

    public function downgradeToDefaultPlan(User $user): void
    {
        Log::info("Понижаем пользователя {$user->id} до базового плана из-за истечения подписки.");

        $planSettings = self::PLANS['base'];

        $user->update([
            'subscription_plan'       => 'base',
            'subscription_expires_at' => null,
            'gumroad_subscriber_id'   => null,

            'daily_template_limit'    => $planSettings['daily_template_limit'],
            'daily_signature_limit'   => $planSettings['daily_signature_limit'],
            'daily_download_limit'    => $planSettings['daily_download_limit'],
            'custom_template_limit'   => $planSettings['custom_template_limit'],

            'templates_left'          => $planSettings['daily_template_limit'],
            'signatures_left'         => $planSettings['daily_signature_limit'],
            'downloads_left'          => $planSettings['daily_download_limit'],
            'custom_templates_left'   => $planSettings['custom_template_limit'],
        ]);
    }
}
