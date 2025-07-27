<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'subscription_plan',
        'subscription_expires_at',
        'daily_template_limit',
        'daily_signature_limit',
        'daily_download_limit',
        'custom_template_limit',
        'templates_left',
        'signatures_left',
        'downloads_left',
        'custom_templates_left',
        'limits_reset_at',
        'gumroad_subscriber_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'subscription_expires_at' => 'datetime',
            'limits_reset_at' => 'date',
        ];
    }

    // --- ✅ НОВЫЕ АКСЕССОРЫ ДЛЯ АДМИНИСТРАТОРОВ ---

    /**
     * Аксессор, который "на лету" подменяет тариф для администратора.
     * Теперь любая часть кода, которая запросит $user->subscription_plan,
     * получит 'pro', если пользователь - админ.
     */
    public function getSubscriptionPlanAttribute($value)
    {
        if ($this->is_admin) {
            return 'pro';
        }
        return $value;
    }

    /**
     * Аксессор, который устанавливает "вечную" дату окончания подписки для админа.
     */
    public function getSubscriptionExpiresAtAttribute($value)
    {
        if ($this->is_admin) {
            return Carbon::now()->addYears(100);
        }
        return $value;
    }

    // --- ЛОГИКА УПРАВЛЕНИЯ ЛИМИТАМИ ---

    public function checkAndResetLimits(): void
    {
        // Для администраторов лимиты не проверяем и не сбрасываем
        if ($this->is_admin) {
            $this->setLimitsForPlan('pro'); // Убедимся, что лимиты всегда максимальные
            return;
        }

        $today = Carbon::today();
        $needsSave = false;

        if ($this->attributes['subscription_plan'] !== 'base' && $this->attributes['subscription_expires_at'] && Carbon::parse($this->attributes['subscription_expires_at'])->isPast()) {
            $this->setLimitsForPlan('base');
            $this->attributes['subscription_plan'] = 'base';
            $this->attributes['subscription_expires_at'] = null;
            $needsSave = true;
        }

        if (!$this->limits_reset_at || !$this->limits_reset_at->isSameDay($today)) {
            $this->setLimitsForPlan($this->attributes['subscription_plan'] ?? 'base');
            $this->limits_reset_at = $today;
            $needsSave = true;
        }

        if ($needsSave) {
            $this->save();
        }
    }

    public function canPerformAction(string $actionType): bool
    {
        // ✅ Администратор может выполнять любое действие без ограничений
        if ($this->is_admin) {
            return true;
        }

        $this->checkAndResetLimits();

        switch ($actionType) {
            case 'download':
                return $this->downloads_left > 0;
            case 'signature':
                return $this->signatures_left > 0;
            case 'custom_template':
                return $this->custom_templates_left > 0;
            default:
                return false;
        }
    }

    public function decrementLimit(string $actionType): void
    {
        // Для администраторов лимиты не уменьшаем
        if ($this->is_admin) {
            return;
        }

        switch ($actionType) {
            case 'download':
                $this->decrement('downloads_left');
                break;
            case 'signature':
                $this->decrement('signatures_left');
                break;
            case 'custom_template':
                $this->decrement('custom_templates_left');
                break;
        }
    }

    protected function setLimitsForPlan(string $planName): void
    {
        $plans = config('subscriptions.plans');
        $planSettings = $plans[$planName] ?? $plans['base'];

        $this->daily_template_limit = $planSettings['daily_template_limit'];
        $this->daily_signature_limit = $planSettings['daily_signature_limit'];
        $this->daily_download_limit = $planSettings['daily_download_limit'];
        $this->custom_template_limit = $planSettings['custom_template_limit'];

        $this->templates_left = $planSettings['daily_template_limit'];
        $this->signatures_left = $planSettings['daily_signature_limit'];
        $this->downloads_left = $planSettings['daily_download_limit'];
        $this->custom_templates_left = $planSettings['custom_template_limit'];
    }

    public function resetDailyLimits(): void
    {
        $basePlanSettings = config('subscriptions.plans.base');
        $this->update([
            'templates_left' => $basePlanSettings['daily_template_limit'],
            'signatures_left' => $basePlanSettings['daily_signature_limit'],
            'downloads_left' => $basePlanSettings['daily_download_limit'],
        ]);
    }

    // --- СВЯЗИ МОДЕЛИ ---

    public function userTemplates()
    {
        return $this->hasMany(UserTemplate::class);
    }

    public function generatedDocuments()
    {
        return $this->hasMany(GeneratedDocument::class);
    }

    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function signedDocuments()
    {
        return $this->hasMany(SignedDocument::class);
    }
}
