<?php
namespace App\Http\Controllers;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Template;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create();
        $locales = config('app.available_locales');

        // Главные страницы для каждого языка
        foreach ($locales as $locale) {
            $sitemap->add(Url::create(route('home', ['locale' => $locale]))
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.9));
        }

        // Страницы шаблонов для каждого языка
        $templates = Template::where('is_active', true)->get();
        foreach ($templates as $template) {
            $url = Url::create(route('templates.show', ['locale' => $locales[0], 'template' => $template->slug]))
                ->setLastModificationDate($template->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.8);

            // Добавляем hreflang
            foreach ($locales as $locale) {
                $url->addAlternate(route('templates.show', ['locale' => $locale, 'template' => $template->slug]), $locale);
            }
            $sitemap->add($url);
        }

        return $sitemap;
    }
}
