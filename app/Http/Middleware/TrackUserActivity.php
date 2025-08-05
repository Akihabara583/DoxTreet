<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache; // Импортируем фасад кэша
use App\Models\Visit;
use Carbon\Carbon;
use App\Models\User;

class TrackUserActivity
{
    public function handle(Request $request, Closure $next)
    {
        if ($user = $request->user()) {
            // --- Оптимизированное отслеживание онлайн-статуса ---
            if (!$user->is_admin) {
                // Ключ для кэша, уникальный для каждого пользователя
                $cacheKey = 'user-is-online-' . $user->id;
                $user->checkAndResetLimits();

                // Помещаем в кэш метку на 2 минуты.
                // Это сверхбыстрая операция (в Redis/Memcached).
                Cache::put($cacheKey, true, now()->addMinutes(2));

                // Обновляем `last_seen` в базе данных НЕ чаще, чем раз в 5 минут,
                // чтобы не "долбить" БД на каждый запрос.
                if ($user->last_seen === null || $user->last_seen->diffInMinutes(now()) >= 5) {
                    $user->last_seen = now();
                    $user->save();
                }
            }
        }

        // --- Оптимизированное отслеживание уникального визита ---
        // Ключ для сессии, который будет сбрасываться каждый день
        $visitSessionKey = 'visit-recorded-on-' . today()->toDateString();

        // Если в сессии НЕТ метки о сегодняшнем визите, то проверяем и создаем.
        if (!session($visitSessionKey)) {
            $ipAddress = $request->ip();
            $userId = Auth::id();

            // Проверяем в БД только один раз за сессию (или за день)
            $visitExists = Visit::whereDate('created_at', today())
                ->where(function ($query) use ($userId, $ipAddress) {
                    if ($userId) {
                        $query->where('user_id', $userId);
                    } else {
                        $query->whereNull('user_id')->where('ip_address', $ipAddress);
                    }
                })
                ->exists();

            if (!$visitExists) {
                Visit::create([
                    'user_id'    => $userId,
                    'ip_address' => $ipAddress,
                ]);
            }

            // Ставим метку в сессию, чтобы больше не проверять БД сегодня
            session([$visitSessionKey => true]);
        }

        return $next($request);
    }
}
