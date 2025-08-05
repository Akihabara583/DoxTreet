<?php

use App\Http\Controllers\CookieConsentController;
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
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\EmailVerificationCodeController;



Route::get('/verify-email-code', [EmailVerificationCodeController::class, 'showVerificationForm'])->name('verification.code.form');
Route::post('/verify-email-code', [EmailVerificationCodeController::class, 'verifyCode'])->name('verification.code.verify');

// --- РОУТЫ БЕЗ ЯЗЫКОВОГО ПРЕФИКСА ---

Route::post('/webhooks/gumroad', [WebhookController::class, 'handleGumroad'])->name('webhooks.gumroad');

Route::get('/auth/{provider}/redirect', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback'])->name('social.callback');
Route::get('/my-super-secret-page', function () {
    return 'My Secret Page';
})->middleware(['auth', 'verified']);

// ✅ ИЗМЕНЕНИЕ: Оставляем только один роут для переключения языка.
// Второй, который был ниже, я удалил.
Route::get('/language/{language}', [LanguageController::class, 'switch'])->name('language.switch');

Route::get('/cookie-consent/accept', [CookieConsentController::class, 'accept'])->name('cookie.accept');
Route::get('/cookie-consent/decline', [CookieConsentController::class, 'decline'])->name('cookie.decline');

Route::get('/', function () {
    $locale = session('locale', config('app.fallback_locale'));
    // ✅ ИЗМЕНЕНИЕ: Убедимся, что редирект идет на именованный роут 'home'
    return redirect()->route('home', ['locale' => $locale]);
});

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/robots.txt', function () {
    $sitemapUrl = route('sitemap.index');
    $content = "User-agent: *\nAllow: /\n\nSitemap: {$sitemapUrl}";
    return response($content, 200)->header('Content-Type', 'text/plain');
});

// ❌ ИЗМЕНЕНИЕ: ЭТА СТРОКА УДАЛЕНА ОТСЮДА
// require __DIR__.'/auth.php';

// --- ГРУППА РОУТОВ С ЯЗЫКОВЫМ ПРЕФИКСОМ ---
Route::prefix('{locale}')
    ->where(['locale' => '[a-z]{2}'])
    ->middleware(InitializeLocale::class)
    ->group(function () {

        // ✅ КЛЮЧЕВОЕ ИЗМЕНЕНИЕ: Все роуты аутентификации (login, register, и т.д.)
        // теперь находятся внутри этой группы и будут иметь префикс /en/, /ru/ и т.д.
        require __DIR__.'/auth.php';

        // Дашборд теперь тоже внутри, чтобы у него был языковой префикс
        Route::get('/dashboard', function () {
            return redirect()->route('home', ['locale' => app()->getLocale()]);
        })->middleware(['auth'])->name('dashboard');

        //
        // --- Все ваши остальные роуты остаются без изменений ---
        //
        Route::prefix('sign-document')->middleware('auth')->name('sign.')->group(function() {
            Route::get('/', [SignatureController::class, 'index'])->name('index');
            Route::post('/upload', [SignatureController::class, 'sign'])->name('upload');
        });

        Route::get('/', [TemplateController::class, 'index'])->name('home');

        Route::get('/pricing', function () {
            return view('pricing', [
                'currentPlan' => auth()->check() ? (auth()->user()->subscription_plan ?? 'base') : null
            ]);
        })->name('pricing');

        Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
        Route::get('/blog/{slug}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/documents', [DocumentListController::class, 'index'])->name('documents.index');
        Route::get('/documents/country/{countryCode}', [DocumentListController::class, 'showByCountry'])->name('documents.by_country');

        Route::get('/templates/{template}', [TemplateController::class, 'show'])->name('templates.show')->middleware('auth');
        Route::post('/templates/{template}/generate', [TemplateController::class, 'generateDocument'])->name('templates.generate')->middleware('auth');
        Route::get('/documents/{countryCode}/{templateSlug}', [DocumentController::class, 'show'])->name('documents.show')->middleware('auth');
        Route::post('/documents/{countryCode}/{templateSlug}/generate', [DocumentController::class, 'generate'])->name('documents.generate')->middleware('auth');

        Route::prefix('admin')->middleware(['auth', IsAdminMiddleware::class])->name('admin.')->group(function () {
            Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');
            Route::resource('categories', Admin\CategoryController::class)->except(['show']);
            Route::resource('templates', Admin\TemplateController::class)->except(['show']);
            Route::resource('posts', Admin\PostController::class)->except(['show']);
            Route::post('/posts/get-templates-by-category', [\App\Http\Controllers\Admin\PostController::class, 'getTemplatesByCategory'])->name('posts.get_templates_by_category');
            Route::get('users', [Admin\UserController::class, 'index'])->name('users.index');
            Route::get('users/{user}', [Admin\UserController::class, 'show'])->name('users.show');
            Route::patch('users/{user}/subscription', [Admin\UserController::class, 'updateSubscription'])->name('users.subscription.update');
            Route::delete('users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
        });

        Route::prefix('profile')->middleware('auth')->name('profile.')->group(function () {
            Route::get('/', [ProfileController::class, 'show'])->name('show');
            Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
            Route::patch('/update', [ProfileController::class, 'update'])->name('update');
            Route::get('/history', [ProfileController::class, 'history'])->name('history');
            Route::get('/history/reuse/{document}', [ProfileController::class, 'reuse'])->name('history.reuse');
            Route::post('/history/delete-selected', [ProfileController::class, 'deleteSelectedGeneratedDocuments'])->name('history.delete-selected');
            Route::post('/history/delete-all', [ProfileController::class, 'deleteAllGeneratedDocuments'])->name('history.delete-all');
            Route::get('/my-data', [ProfileController::class, 'myData'])->name('my-data');
            Route::patch('/my-data', [ProfileController::class, 'updateMyData'])->name('my-data.update');
            Route::get('/signed-documents', [ProfileController::class, 'signedDocumentsHistory'])->name('signed-documents.history');
            Route::get('/signed-documents/{document}/download', [ProfileController::class, 'downloadSignedDocument'])->name('signed-documents.download');
            Route::post('/signed-documents/delete-selected', [ProfileController::class, 'deleteSelectedSignedDocuments'])->name('signed-documents.delete-selected');
            Route::post('/signed-documents/delete-all', [ProfileController::class, 'deleteAllSignedDocuments'])->name('signed-documents.delete-all');
            Route::get('/subscription', [ProfileController::class, 'subscription'])->name('subscription');
            Route::post('/profile/subscription/cancel', [App\Http\Controllers\ProfileController::class, 'cancelSubscription'])
                ->name('subscription.cancel');

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

        // Статические страницы теперь тоже внутри группы, чтобы иметь языковой префикс
        Route::get('/terms', [StaticPageController::class, 'show'])->name('terms');
        Route::get('/privacy', [StaticPageController::class, 'show'])->name('privacy');
        Route::get('/faq', [StaticPageController::class, 'show'])->name('faq');
        Route::get('/about', [StaticPageController::class, 'show'])->name('about');
    });

// ❌ ИЗМЕНЕНИЕ: Эта группа больше не нужна, так как роуты перенесены выше
// Route::middleware('web')->group(function () { ... });

Route::get('/info', function () { phpinfo(); });
