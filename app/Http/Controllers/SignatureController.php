<?php

// Файл: app/Http/Controllers/SignatureController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\SignedDocument;
use setasign\Fpdi\Tcpdf\Fpdi;

class SignatureController extends Controller
{
    public function index(): View
    {
        return view('sign.index');
    }

    public function sign(Request $request)
    {
        $request->validate([
            'document' => ['required', 'file', 'mimes:pdf', 'max:10240'],
            'signature' => ['required', 'string'],
            'page' => ['required', 'integer', 'min:1'],
            'position_x' => ['required', 'integer', 'min:0', 'max:100'],
            'position_y' => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        $user = Auth::user();

        // ✅ ИЗМЕНЕННАЯ ЛОГИКА: Ссылка в ошибке ведет на страницу тарифов
        if (!$user->canPerformAction('signature')) {
            $errorMessage = __('messages.limit_exhausted_signature_error', ['url' => route('pricing', app()->getLocale())]);
            return back()->with('error_html', $errorMessage);
        }

        $documentCount = SignedDocument::where('user_id', $user->id)->count();
        if ($documentCount >= 20) {
            $oldestDocument = SignedDocument::where('user_id', $user->id)->oldest()->first();
            if ($oldestDocument) {
                Storage::disk('public')->delete($oldestDocument->signed_file_path);
                $oldestDocument->delete();
            }
        }

        $file = $request->file('document');
        $signatureDataUrl = $request->input('signature');

        if ($request->has('save_signature')) {
            $user->details()->updateOrCreate(['user_id' => $user->id], ['signature' => $signatureDataUrl]);
        }

        $tempPath = $file->store('temp_pdf', 'local');

        try {
            $fullTempPath = Storage::disk('local')->path($tempPath);
            $outputFilePath = $this->placeSignatureOnPdf(
                $fullTempPath,
                $signatureDataUrl,
                $request->input('page'),
                $request->input('position_x'),
                $request->input('position_y')
            );
        } catch (\Exception $e) {
            Storage::disk('local')->delete($tempPath);
            return back()->withErrors(['msg' => 'Не удалось обработать PDF: ' . $e->getMessage()]);
        } finally {
            Storage::disk('local')->delete($tempPath);
        }

        $relativePath = str_replace(storage_path('app/public/'), '', $outputFilePath);
        $relativePath = str_replace('\\', '/', $relativePath);
        SignedDocument::create([
            'user_id' => $user->id,
            'original_filename' => $file->getClientOriginalName(),
            'signed_file_path' => $relativePath,
        ]);

        $user->decrementLimit('signature');

        return response()->download($outputFilePath);
    }

    private function placeSignatureOnPdf(string $pdfPath, string $signatureDataUrl, int $pageNumber, int $xPercent, int $yPercent): string
    {
        $pdf = new Fpdi();
        $normalizedPdfPath = str_replace('\\', '/', $pdfPath);
        $pageCount = $pdf->setSourceFile($normalizedPdfPath);

        if ($pageNumber > $pageCount) {
            $pageNumber = $pageCount;
        }

        for ($i = 1; $i <= $pageCount; $i++) {
            $tplId = $pdf->importPage($i);
            $size = $pdf->getTemplateSize($tplId);
            $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
            $pdf->useTemplate($tplId);
        }

        $pdf->setPage($pageNumber);

        $signatureImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureDataUrl));
        $signatureImagePath = tempnam(sys_get_temp_dir(), 'sig') . '.png';
        file_put_contents($signatureImagePath, $signatureImage);

        $signatureWidth = 50;
        $signatureHeight = 25;

        $pageWidth = $pdf->getPageWidth();
        $pageHeight = $pdf->getPageHeight();
        $xPos = ($pageWidth * ($xPercent / 100)) - ($signatureWidth / 2);
        $yPos = ($pageHeight * ($yPercent / 100)) - ($signatureHeight / 2);

        $pdf->Image($signatureImagePath, $xPos, $yPos, $signatureWidth, $signatureHeight, 'PNG');
        unlink($signatureImagePath);

        $outputDir = storage_path('app/public/signed_documents');
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0755, true);
        }
        $outputFilename = uniqid('signed_') . '.pdf';
        $fullOutputPath = $outputDir . '/' . $outputFilename;
        $pdf->Output($fullOutputPath, 'F');

        return $fullOutputPath;
    }
}
