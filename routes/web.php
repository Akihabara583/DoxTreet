<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\InitializeLocale;

// --- РОУТЫ БЕЗ ЯЗЫКОВОГО ПРЕФИКСА ---
Route::get('/', function () { $locale = session('locale', config('app.fallback_locale')); return redirect($locale); });
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/robots.txt', function () { $sitemapUrl = route('sitemap.index'); $content = "User-agent: *\nAllow: /\n\nSitemap: {$sitemapUrl}"; return response($content, 200)->header('Content-Type', 'text/plain'); });
require __DIR__.'/auth.php';
Route::get('/dashboard', function () { return redirect()->route('home', ['locale' => app()->getLocale()]); })->middleware(['auth'])->name('dashboard');
Route::get('/language/{language}', [LanguageController::class, 'switch'])->name('language.switch');

// --- ГРУППА РОУТОВ С ЯЗЫКОВЫМ ПРЕФИКСОМ ---
Route::prefix('{locale}')
    ->where(['locale' => '[a-z]{2}'])
    ->middleware(InitializeLocale::class)
    ->group(function () {

        // Публичные страницы
        Route::get('/', [TemplateController::class, 'index'])->name('home');

        // ИСПРАВЛЕНИЕ: Мы убрали ':slug'. Теперь модель Template сама будет отвечать за поиск по slug.
        Route::get('/templates/{template}', [TemplateController::class, 'show'])->name('templates.show');

        Route::post('/templates/{template}/generate', [TemplateController::class, 'generatePdf'])->name('templates.generate');
        Route::get('/pricing', function () { return view('pricing'); })->name('pricing');
        Route::post('/templates/{template}/generate-docx', [TemplateController::class, 'generateDocx'])->name('templates.generate.docx');

        // Админ-панель
        Route::prefix('admin')
            ->middleware(['auth', IsAdminMiddleware::class])
            ->name('admin.')
            ->group(function () {
                Route::get('/', function() { return view('admin.dashboard'); })->name('dashboard');
                Route::resource('categories', Admin\CategoryController::class)->except(['show']);
                Route::resource('templates', Admin\TemplateController::class)->except(['show']);
            });

        // Личный кабинет
        Route::prefix('profile')
            ->middleware('auth')
            ->name('profile.')
            ->group(function () {
                Route::get('/', [ProfileController::class, 'show'])->name('show');
                Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
                Route::patch('/update', [ProfileController::class, 'update'])->name('update');
                Route::get('/history', [ProfileController::class, 'history'])->name('history');
                Route::get('/history/reuse/{document}', [ProfileController::class, 'reuse'])->name('history.reuse');
                Route::get('/my-data', [ProfileController::class, 'myData'])->name('my-data');
                Route::patch('/my-data', [ProfileController::class, 'updateMyData'])->name('my-data.update');
            });
    });

Route::get('/info', function () {
    phpinfo();
});
