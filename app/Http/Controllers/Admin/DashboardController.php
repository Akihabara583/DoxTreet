<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // <-- Убедитесь, что этот импорт есть
use Illuminate\View\View; // <-- Убедитесь, что этот импорт есть
use App\Models\User; // <-- Убедитесь, что этот импорт есть
use App\Models\Visit; // <-- Убедитесь, что этот импорт есть
use Carbon\Carbon; // <-- Убедитесь, что этот импорт есть
use Illuminate\Support\Facades\DB; // <-- Убедитесь, что этот импорт есть
use Illuminate\Support\Facades\Auth; // <-- Убедитесь, что этот импорт есть
use Illuminate\Http\RedirectResponse; // <-- Убедитесь, что этот импорт есть
use App\Models\Category; // <-- ДОБАВЬТЕ ЭТУ СТРОКУ (для App\Models\Category::count())
use App\Models\Template; // <-- ДОБАВЬТЕ ЭТУ СТРОКУ (для App\Models\Template::count())


class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     * @return View|RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        // --- 1. ПРОВЕРКА ДЛЯ "АДМИНА ДЛЯ СОТРУДНИКОВ" ---
        if (Auth::user()->isEmployeeAdmin()) {
            // Если это админ-сотрудник, перенаправляем на Категории
            return redirect()->route('admin.categories.index', app()->getLocale())
                ->with('error', 'У вас нет прав для просмотра этой страницы.');
        }

        // --- КОД НИЖЕ ВИДЕН ТОЛЬКО "СУПЕР-АДМИНУ" ---

        // Пользователи онлайн (не админы), активные за последние 5 минут
        $onlineUsers = User::where('is_admin', false)
            ->where('last_seen', '>', Carbon::now()->subMinutes(5))
            ->count();

        // Статистика посещений
        $visitsToday = Visit::whereDate('created_at', today())->count();
        $visitsWeek = Visit::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $visitsMonth = Visit::whereMonth('created_at', Carbon::now()->month)->count();

        // --- ИЗМЕНЕННАЯ ЛОГИКА ДЛЯ uniqueVisitorsToday ---
        // ВАЖНО: Для корректной работы этого запроса в таблице `visits` должен быть столбец `ip_address`,
        // и вы должны записывать IP-адрес при каждом посещении.
        $uniqueVisitorsToday = Visit::whereDate('created_at', today())
            ->select(DB::raw('COUNT(DISTINCT user_id) + COUNT(DISTINCT CASE WHEN user_id IS NULL THEN ip_address ELSE NULL END) as total_unique_visitors'))
            ->value('total_unique_visitors');


        // Статистика по подпискам
        $subscriptionStats = User::query()
            ->select('subscription_plan', DB::raw('count(*) as total'))
            ->where('is_admin', false)
            ->groupBy('subscription_plan')
            ->pluck('total', 'subscription_plan');

        // Статистика контента
        $totalTemplates = Template::count(); // <-- ИЗМЕНЕНО: App\Models\Template::count() на Template::count()
        $totalCategories = Category::count(); // <-- ИЗМЕНЕНО: App\Models\Category::count() на Category::count()

        return view('admin.dashboard', compact(
            'onlineUsers',
            'visitsToday',
            'uniqueVisitorsToday',
            'visitsWeek',
            'visitsMonth',
            'subscriptionStats',
            'totalTemplates',
            'totalCategories'
        ));
    }
}
