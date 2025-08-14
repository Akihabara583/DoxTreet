<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Visit;
use Carbon\Carbon;
use App\Models\User;

class TrackUserActivity
{
    public function handle(Request $request, Closure $next)
    {
        if ($user = $request->user()) {
            if (!$user->is_admin) {
                $cacheKey = 'user-is-online-' . $user->id;
                $user->checkAndResetLimits();

                Cache::put($cacheKey, true, now()->addMinutes(2));

                // ✅ ИСПРАВЛЕНИЕ: Оборачиваем $user->last_seen в Carbon::parse() для безопасности
                // Это предотвратит ошибку, если свойство окажется строкой.
                if ($user->last_seen === null || Carbon::parse($user->last_seen)->diffInMinutes(now()) >= 5) {
                    $user->last_seen = now();
                    $user->save();
                }
            }
        }

        $visitSessionKey = 'visit-recorded-on-' . today()->toDateString();

        if (!session($visitSessionKey)) {
            $ipAddress = $request->ip();
            $userId = Auth::id();

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

            session([$visitSessionKey => true]);
        }

        return $next($request);
    }
}
