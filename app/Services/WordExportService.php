<?php

namespace App\Services;

use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\View;
use PhpOffice\PhpWord\Shared\Html;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class WordExportService
{
    /**
     * Создает документ Word на основе HTML из Blade-шаблона.
     *
     * @param string $viewPath Путь к Blade-шаблону.
     * @param array $data Данные для подстановки в шаблон.
     * @param string $fileName Имя файла для скачивания.
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generate(string $viewPath, array $data, string $fileName): BinaryFileResponse
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // 1. Получаем полный HTML
        $fullHtml = View::make($viewPath, ['data' => $data])->render();

        // 2. Используем DOMDocument для парсинга HTML и извлечения контента
        $dom = new \DOMDocument();
        @$dom->loadHTML($fullHtml, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $body = $dom->getElementsByTagName('body')->item(0);
        $content = '';
        foreach ($body->childNodes as $child) {
            // ФИНАЛЬНОЕ ИСПРАВЛЕНИЕ: Используем saveXML вместо saveHTML
            // Это гарантирует, что теги вроде <br> будут преобразованы в <br/>
            $content .= $dom->saveXML($child);
        }

        // 3. Передаем валидный XML-фрагмент в PhpWord
        Html::addHtml($section, $content, false, false);

        // 4. Сохраняем и отдаем файл
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $tempFile = tempnam(sys_get_temp_dir(), 'phpword');
        $objWriter->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}
