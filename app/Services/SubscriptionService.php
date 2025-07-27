<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;

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

    /**
     * ✅ ИЗМЕНЕННЫЙ МЕТОД
     * Назначает пользователю новый тарифный план.
     *
     * @param User $user
     * @param string $planName
     * @param int|null $days
     * @return void
     */
    public function assignPlan(User $user, string $planName, ?int $days): void
    {
        if (!isset(self::PLANS[$planName])) {
            return;
        }

        $planSettings = self::PLANS[$planName];

        // Если план не 'base' и указаны дни, рассчитываем дату окончания. Иначе - null.
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
}
