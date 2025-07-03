<?php

namespace App\Services;

use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\View;
use PhpOffice\PhpWord\Shared\Html;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class WordExportService
{
    /**
     * Старый метод для генерации из Blade-файлов. Мы его не трогаем.
     */
    public function generate(string $viewPath, array $data, string $fileName): BinaryFileResponse
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $fullHtml = View::make($viewPath, ['data' => $data])->render();
        $dom = new \DOMDocument();
        @$dom->loadHTML($fullHtml, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $body = $dom->getElementsByTagName('body')->item(0);
        $content = '';
        foreach ($body->childNodes as $child) {
            $content .= $dom->saveXML($child);
        }
        Html::addHtml($section, $content, false, false);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $tempFile = tempnam(sys_get_temp_dir(), 'phpword');
        $objWriter->save($tempFile);
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    /**
     * ✅ НОВЫЙ МЕТОД для генерации из готовой HTML-строки.
     *
     * @param string $htmlContent Готовый HTML-код документа.
     * @param string $fileName Имя файла для скачивания.
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function generateFromHtml(string $htmlContent, string $fileName): BinaryFileResponse
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Просто передаем готовый HTML в библиотеку
        Html::addHtml($section, $htmlContent, false, false);

        // Сохраняем и отдаем файл (логика та же)
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $tempFile = tempnam(sys_get_temp_dir(), 'phpword');
        $objWriter->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}
