<?php

namespace App\Models;

use App\Services\SubscriptionService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Auth\MustVerifyEmail;// Импортируем фасад Crypt
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

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
        'last_seen',
        'provider_name', // Добавлено для совместимости с SocialController
        'provider_id',
        'email_verified_at',
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
            'last_seen' => 'datetime',
        ];
    }

    // Массив атрибутов, которые нужно зашифровать
    protected $encrypted = [
        'name',

        // 'gumroad_subscriber_id', // Возможно, это тоже стоит зашифровать, если он конфиденциален.
        // Решение за вами, если да, раскомментируйте.
    ];

    /**
     * Динамическое получение атрибутов, которые должны быть зашифрованы/расшифрованы.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encrypted) && ! is_null($value)) {
            try {
                return Crypt::decryptString($value);
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                // Обработка ошибки дешифрования.
                // Возможно, данные были не зашифрованы или ключ изменился.
                // В данном случае, возвращаем оригинальное значение,
                // чтобы избежать падения приложения.
                // В реальном приложении это может быть логирование или выброс исключения.
                return $value;
            }
        }

        return $value;
    }

    /**
     * Динамическая установка атрибутов, которые должны быть зашифрованы.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encrypted) && ! is_null($value)) {
            $this->attributes[$key] = Crypt::encryptString($value);
        } else {
            parent::setAttribute($key, $value);
        }

        return $this;
    }

    // --- ✅ НОВЫЕ АКСЕССОРЫ ДЛЯ АДМИНИСТРАТОРОВ ---

    /**
     * Аксессор, который "на лету" подменяет тариф для администратора.
     * Теперь любая часть кода, которая запросит $user->subscription_plan,
     * получит 'pro', если пользователь - админ.
     */
    public function getSubscriptionPlanAttribute($value)
    {
        // Используем $this->attributes['is_admin'] для прямого доступа к оригинальному значению,
        // чтобы избежать рекурсии или нежелательного поведения, если 'is_admin' тоже будет зашифровано.
        // Хотя 'is_admin' у вас boolean и не требует шифрования.
        if ($this->attributes['is_admin']) {
            return 'pro';
        }
        return $value;
    }

    /**
     * Аксессор, который устанавливает "вечную" дату окончания подписки для админа.
     */
    public function getSubscriptionExpiresAtAttribute($value)
    {
        if ($this->attributes['is_admin']) {
            return Carbon::now()->addYears(100);
        }
        return $value ? Carbon::parse($value) : null;
    }

    // --- ЛОГИКА УПРАВЛЕНИЯ ЛИМИТАМИ ---

    public function checkAndResetLimits(): void
    {
        // Для администраторов лимиты не проверяем и не сбрасываем
        if ($this->attributes['is_admin']) {
            $this->setLimitsForPlan('pro'); // Убедимся, что лимиты всегда максимальные
            return;
        }

        $today = Carbon::today();
        $needsSave = false;

        if ($this->attributes['subscription_plan'] !== 'base' && $this->attributes['subscription_expires_at'] && Carbon::parse($this->attributes['subscription_expires_at'])->isPast()) {
            $this->setLimitsForPlan('base');
            $this->attributes['subscription_plan'] = 'base';
            $this->attributes['subscription_expires_at'] = null;
            $this->attributes['gumroad_subscriber_id'] = null;
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
        if ($this->attributes['is_admin']) {
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
        if ($this->attributes['is_admin']) {
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
    protected static function booted()
    {
        static::deleting(function ($user) {
            // ✅ ИСПРАВЛЕНИЕ 2: Теперь этот вызов будет работать правильно
            try {
                $subscriptionService = app(SubscriptionService::class);
                $subscriptionService->cancel($user);
            } catch (\Exception $e) {
                Log::critical("Не удалось отменить подписку для пользователя {$user->id} при удалении аккаунта.", [
                    'error' => $e->getMessage()
                ]);
            }

            // Очистка связанных данных
            $user->userTemplates()->delete();
            $user->generatedDocuments()->delete();
            $user->details()->delete();
            $user->signedDocuments->each(function ($document) {
                Storage::disk('public')->delete($document->signed_file_path);
                $document->delete();
            });
        });
    }


    public function isEmployeeAdmin(): bool
    {
        // ВНИМАНИЕ: Если 'email' снова станет зашифрованным, эта проверка сломается.
        // Более надежный способ - проверять по ID, если ID этого аккаунта не изменится.
        return $this->email === 'employee.admin@example.com';

        // ИЛИ, если вы знаете ID этого пользователя (например, если он 8):
         return $this->id === 1;
    }
}
