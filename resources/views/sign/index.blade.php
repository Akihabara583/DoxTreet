@extends('layouts.app')

@section('title', __('messages.sign_document') . ' - ' . config('app.name'))

@push('styles')
    {{-- Стили для страницы --}}
    <style>
        #signature-pad {
            border: 2px dashed #0D6EFD;
            border-radius: 5px;
            cursor: crosshair;
        }
        .signature-wrapper {
            background-color: #e9ecef;
            border-radius: .375rem;
            padding: 1rem;
        }
        .controls {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        #pdf-render-area {
            border: 1px solid #ddd;
            height: 500px;
            overflow-y: auto;
            background-color: #f8f9fa;
            padding: 10px;
            position: relative;
        }
        .pdf-page-container {
            position: relative;
            margin: 0 auto 10px auto;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
            width: fit-content;
            cursor: pointer;
        }
        .pdf-page-canvas {
            display: block;
        }
        #signature-placement-marker {
            position: absolute;
            width: 150px;
            height: 75px;
            background-color: rgba(13, 110, 253, 0.3);
            border: 2px dashed #0D6EFD;
            border-radius: 5px;
            display: none;
            align-items: center;
            justify-content: center;
            color: #0D6EFD;
            font-size: 12px;
            font-weight: bold;
            pointer-events: all; /* Разрешаем события мыши для перетаскивания */
            cursor: move;
            user-select: none;
            transform: translate(-50%, -50%);
            z-index: 10;
        }
    </style>
@endpush

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form id="sign-form" action="{{ route('sign.upload', ['locale' => app()->getLocale()]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow-sm">
                        <div class="card-header bg-light py-3">
                            <h1 class="h4 mb-0">{{ __('messages.sign_document') }}</h1>
                        </div>
                        <div class="card-body p-4">

                            <div id="error-container"></div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                {{-- Левая колонка: Загрузка и предпросмотр --}}
                                <div class="col-md-7">
                                    <h5>1. {{ __('messages.upload_document') }}</h5>
                                    <div class="mb-3">
                                        <label for="document" class="form-label">{{ __('messages.select_pdf_file') }}</label>
                                        <input class="form-control" type="file" id="document" name="document" accept="application/pdf" required>
                                    </div>

                                    <div id="preview-container" style="display: none;">
                                        <p class="fw-bold">{{ __('messages.click_or_drag_to_place_signature') }}</p>
                                        <div id="pdf-render-area">
                                            {{-- Сюда JS будет добавлять страницы PDF --}}
                                        </div>
                                    </div>
                                </div>

                                {{-- Правая колонка: Подпись --}}
                                <div class="col-md-5">
                                    <h5>2. {{ __('messages.place_your_signature_here') }}</h5>
                                    <div class="signature-wrapper">
                                        <p class="text-muted small mb-2">{{ __('messages.draw_in_this_box') }}</p>
                                        <canvas id="signature-pad" width="400" height="200"></canvas>
                                        <div class="controls">
                                            <button type="button" id="clear-signature" class="btn btn-sm btn-outline-secondary">{{ __('messages.clear') }}</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="signature" id="signature-data">

                                    <input type="hidden" name="position_x" id="position_x" value="85">
                                    <input type="hidden" name="position_y" id="position_y" value="85">
                                    <input type="hidden" name="page" id="page" value="1">

                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" name="save_signature" id="save-signature">
                                        <label class="form-check-label" for="save_signature">
                                            {{ __('messages.save_signature_to_profile') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="d-grid">
                                <button type="submit" id="submit-button" class="btn btn-primary btn-lg">{{ __('messages.sign_and_download') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

            const signaturePadCanvas = document.getElementById('signature-pad');
            // ✅ ИСПРАВЛЕНИЕ 1: Убираем backgroundColor, чтобы фон был прозрачным
            const signaturePad = new SignaturePad(signaturePadCanvas);

            function resizeSignatureCanvas() {
                const ratio =  Math.max(window.devicePixelRatio || 1, 1);
                signaturePadCanvas.width = signaturePadCanvas.offsetWidth * ratio;
                signaturePadCanvas.height = signaturePadCanvas.offsetHeight * ratio;
                signaturePadCanvas.getContext("2d").scale(ratio, ratio);
                signaturePad.clear();
            }
            window.addEventListener("resize", resizeSignatureCanvas);
            resizeSignatureCanvas();

            const clearButton = document.getElementById('clear-signature');
            const form = document.getElementById('sign-form');
            const signatureDataInput = document.getElementById('signature-data');
            const documentInput = document.getElementById('document');
            const previewContainer = document.getElementById('preview-container');
            const errorContainer = document.getElementById('error-container');

            const pdfRenderArea = document.getElementById('pdf-render-area');
            const placementMarker = document.createElement('div');
            placementMarker.id = 'signature-placement-marker';
            placementMarker.innerHTML = `<span>{{ __('messages.signature_placement') }}</span>`;

            const posXInput = document.getElementById('position_x');
            const posYInput = document.getElementById('position_y');
            const pageInput = document.getElementById('page');

            async function renderPdf(file) {
                pdfRenderArea.innerHTML = '';
                const fileReader = new FileReader();

                fileReader.onload = async function() {
                    const typedarray = new Uint8Array(this.result);
                    const pdf = await pdfjsLib.getDocument(typedarray).promise;

                    for (let i = 1; i <= pdf.numPages; i++) {
                        const page = await pdf.getPage(i);
                        const viewport = page.getViewport({ scale: 1.5 });

                        const pageContainer = document.createElement('div');
                        pageContainer.className = 'pdf-page-container';
                        pageContainer.dataset.pageNumber = i;

                        const canvas = document.createElement('canvas');
                        canvas.className = 'pdf-page-canvas';
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        pageContainer.appendChild(canvas);
                        pdfRenderArea.appendChild(pageContainer);

                        await page.render({ canvasContext: canvas.getContext('2d'), viewport: viewport }).promise;
                    }
                    // После рендера добавляем маркер в область
                    pdfRenderArea.appendChild(placementMarker);
                };
                fileReader.readAsArrayBuffer(file);
            }

            // ✅ ИСПРАВЛЕНИЕ 2: ОБЪЕДИНЕННАЯ ЛОГИКА КЛИКА И ПЕРЕТАСКИВАНИЯ
            let isDragging = false;
            let initialX, initialY;

            function updateMarkerPosition(x, y, pageElement) {
                const pageRect = pageElement.getBoundingClientRect();
                const renderAreaRect = pdfRenderArea.getBoundingClientRect();

                // Координаты относительно страницы
                const xOnPage = x - pageRect.left;
                const yOnPage = y - pageRect.top;

                // Координаты относительно всей области рендера
                const xOnRenderArea = x - renderAreaRect.left + pdfRenderArea.scrollLeft;
                const yOnRenderArea = y - renderAreaRect.top + pdfRenderArea.scrollTop;

                placementMarker.style.left = xOnRenderArea + 'px';
                placementMarker.style.top = yOnRenderArea + 'px';
                placementMarker.style.display = 'flex';

                // Обновляем скрытые поля
                posXInput.value = Math.round((xOnPage / pageRect.width) * 100);
                posYInput.value = Math.round((yOnPage / pageRect.height) * 100);
                pageInput.value = pageElement.dataset.pageNumber;
            }

            // Клик для установки маркера
            pdfRenderArea.addEventListener('click', (e) => {
                // Игнорируем клик, если он был по самому маркеру (чтобы не сбивать перетаскивание)
                if (e.target.id === 'signature-placement-marker') return;

                const targetContainer = e.target.closest('.pdf-page-container');
                if (targetContainer) {
                    updateMarkerPosition(e.clientX, e.clientY, targetContainer);
                }
            });

            // Перетаскивание маркера
            placementMarker.addEventListener('mousedown', (e) => {
                isDragging = true;
                initialX = e.clientX - placementMarker.offsetLeft;
                initialY = e.clientY - placementMarker.offsetTop;
            });

            document.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                e.preventDefault();

                const renderAreaRect = pdfRenderArea.getBoundingClientRect();
                let newX = e.clientX - renderAreaRect.left + pdfRenderArea.scrollLeft;
                let newY = e.clientY - renderAreaRect.top + pdfRenderArea.scrollTop;

                // Находим страницу под курсором
                const pages = pdfRenderArea.querySelectorAll('.pdf-page-container');
                let currentPageElement = pages[0];
                for (const page of pages) {
                    if (newY > page.offsetTop) {
                        currentPageElement = page;
                    }
                }
                updateMarkerPosition(e.clientX, e.clientY, currentPageElement);
            });

            document.addEventListener('mouseup', () => {
                isDragging = false;
            });


            clearButton.addEventListener('click', () => signaturePad.clear());

            form.addEventListener('submit', function (event) {
                if (signaturePad.isEmpty()) {
                    event.preventDefault();
                    errorContainer.innerHTML = `<div class="alert alert-danger">{{ __('messages.please_provide_a_signature') }}</div>`;
                    window.scrollTo(0, 0);
                } else {
                    signatureDataInput.value = signaturePad.toDataURL('image/png');
                    errorContainer.innerHTML = '';
                }
            });

            documentInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file && file.type === 'application/pdf') {
                    renderPdf(file);
                    previewContainer.style.display = 'block';
                } else {
                    previewContainer.style.display = 'none';
                    pdfRenderArea.innerHTML = '';
                }
            });
        });
    </script>
@endpush
