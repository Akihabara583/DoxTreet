<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SubscriptionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::where('is_admin', false)
            ->latest()
            ->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function show(string $locale, User $user): View
    {
        $user->load([
            'generatedDocuments' => function ($query) {
                $query->latest()->limit(10);
            },
            'signedDocuments' => function ($query) {
                $query->latest()->limit(10);
            }
        ]);

        return view('admin.users.show', compact('user'));
    }

    /**
     * ✅ ИЗМЕНЕННЫЙ МЕТОД
     * Обновляет подписку пользователя.
     *
     * @param Request $request
     * @param string $locale
     * @param User $user
     * @param SubscriptionService $subscriptionService
     * @return RedirectResponse
     */
    public function updateSubscription(Request $request, string $locale, User $user, SubscriptionService $subscriptionService): RedirectResponse
    {
        $validated = $request->validate([
            // Добавляем 'base' в список разрешенных планов
            'plan' => 'required|string|in:base,standard,pro',
            // Делаем поле необязательным, если выбран план 'base'
            'duration' => 'required_if:plan,standard,pro|nullable|integer|min:1',
        ]);

        $subscriptionService->assignPlan(
            $user,
            $validated['plan'],
            $validated['duration'] ?? null
        );

        return redirect()->route('admin.users.show', ['locale' => $locale, 'user' => $user->id])
            ->with('success', 'Подписка пользователя успешно обновлена!');
    }
    public function destroy(string $locale, User $user): RedirectResponse
    {
        // Проверка, чтобы админ не удалил сам себя
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index', $locale)
                ->with('error', 'Вы не можете удалить свой собственный аккаунт.');
        }

        $user->delete();

        return redirect()->route('admin.users.index', $locale)
            ->with('success', 'Пользователь успешно удален.');
    }
}
