<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\InitializeLocale;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\UserTemplateController;
use App\Http\Controllers\DocumentListController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SignatureController;

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

        // Роуты для подписания документов
        Route::prefix('sign-document')->middleware('auth')->name('sign.')->group(function() {
            Route::get('/', [SignatureController::class, 'index'])->name('index');
            Route::post('/upload', [SignatureController::class, 'sign'])->name('upload');
        });

        // Публичные страницы
        Route::get('/', [TemplateController::class, 'index'])->name('home');
        Route::get('/templates/{template}', [TemplateController::class, 'show'])->name('templates.show');
        Route::post('/templates/{template}/generate', [TemplateController::class, 'generateDocument'])->name('templates.generate');
        Route::get('/pricing', function () { return view('pricing'); })->name('pricing');
        Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
        Route::get('/blog/{slug}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/documents', [DocumentListController::class, 'index'])->name('documents.index');
        Route::get('/documents/country/{countryCode}', [DocumentListController::class, 'showByCountry'])->name('documents.by_country');
        Route::get('/documents/{countryCode}/{templateSlug}', [DocumentController::class, 'show'])->name('documents.show');
        Route::post('/documents/{countryCode}/{templateSlug}/generate', [DocumentController::class, 'generate'])->name('documents.generate');

        // Админ-панель
        Route::prefix('admin')->middleware(['auth', IsAdminMiddleware::class])->name('admin.')->group(function () {
            Route::get('/', function() { return view('admin.dashboard'); })->name('dashboard');
            Route::resource('categories', Admin\CategoryController::class)->except(['show']);
            Route::resource('templates', Admin\TemplateController::class)->except(['show']);
            Route::resource('posts', Admin\PostController::class)->except(['show']);
        });

        // Личный кабинет
        Route::prefix('profile')->middleware('auth')->name('profile.')->group(function () {
            Route::get('/', [ProfileController::class, 'show'])->name('show');
            Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
            Route::patch('/update', [ProfileController::class, 'update'])->name('update');
            Route::get('/history', [ProfileController::class, 'history'])->name('history');
            Route::get('/history/reuse/{document}', [ProfileController::class, 'reuse'])->name('history.reuse');

            // --- НАЧАЛО ИЗМЕНЕНИЙ: МАРШРУТЫ ДЛЯ УДАЛЕНИЯ ИЗ ИСТОРИИ ---
            Route::post('/history/delete-selected', [ProfileController::class, 'deleteSelectedGeneratedDocuments'])->name('history.delete-selected');
            Route::post('/history/delete-all', [ProfileController::class, 'deleteAllGeneratedDocuments'])->name('history.delete-all');
            // --- КОНЕЦ ИЗМЕНЕНИЙ ---

            Route::get('/my-data', [ProfileController::class, 'myData'])->name('my-data');
            Route::patch('/my-data', [ProfileController::class, 'updateMyData'])->name('my-data.update');

            Route::get('/signed-documents', [ProfileController::class, 'signedDocumentsHistory'])->name('signed-documents.history');
            Route::get('/signed-documents/{document}/download', [ProfileController::class, 'downloadSignedDocument'])->name('signed-documents.download');
            Route::post('/signed-documents/delete-selected', [ProfileController::class, 'deleteSelectedSignedDocuments'])->name('signed-documents.delete-selected');
            Route::post('/signed-documents/delete-all', [ProfileController::class, 'deleteAllSignedDocuments'])->name('signed-documents.delete-all');

            Route::prefix('my-templates')->name('my-templates.')->group(function() {
                Route::get('/', [UserTemplateController::class, 'index'])->name('index');
                Route::get('/create', [UserTemplateController::class, 'create'])->name('create');
                Route::post('/', [UserTemplateController::class, 'store'])->name('store');
                Route::get('/{userTemplate}', [UserTemplateController::class, 'show'])->name('show');
                Route::post('/{userTemplate}/generate', [UserTemplateController::class, 'generateDocument'])->name('generate');
                Route::get('/{userTemplate}/edit', [UserTemplateController::class, 'edit'])->name('edit');
                Route::patch('/{userTemplate}', [UserTemplateController::class, 'update'])->name('update');
                Route::delete('/{userTemplate}', [UserTemplateController::class, 'destroy'])->name('destroy');
            });
        });
    });

// Статические страницы
Route::middleware('web')->group(function () {
    Route::get('/{locale}/terms', [StaticPageController::class, 'show'])->name('terms');
    Route::get('/{locale}/privacy', [StaticPageController::class, 'show'])->name('privacy');
    Route::get('/{locale}/faq', [StaticPageController::class, 'show'])->name('faq');
    Route::get('/{locale}/about', [StaticPageController::class, 'show'])->name('about');
});

Route::get('/info', function () { phpinfo(); });
