<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\View;

class StaticPageController extends Controller
{
    public function show(Request $request): View
    {
        // Определяем, какую страницу хочет увидеть пользователь, по названию роута
        $routeName = $request->route()->getName();

        $pageData = [
            'terms' => [
                'title' => 'messages.terms_of_use_title',
                'content' => 'messages.terms_of_use_content',
            ],
            'privacy' => [
                'title' => 'messages.privacy_policy_title',
                'content' => 'messages.privacy_policy_content',
            ],
            'faq' => [
                'title' => 'messages.faq_title',
                'content' => 'messages.faq_content',
            ],
            'about' => [
                'title' => 'messages.about_us_title',
                'content' => 'messages.about_us_content',
            ],
        ];

        // Проверяем, существует ли такой роут в нашем списке
        if (!isset($pageData[$routeName])) {
            abort(404);
        }

        // ✅ ИСПРАВЛЕНО: Передаем текущую локаль в рендер, чтобы route() внутри текста работал корректно
        $contentString = __($pageData[$routeName]['content']);
        $contentRendered = Blade::render($contentString, ['locale' => app()->getLocale()]);

        return view('pages.show', [
            'title' => __($pageData[$routeName]['title']),
            'content' => $contentRendered,
        ]);
    }
}
