@extends('layouts.app')

@section('title', $template->title . ' - ' . config('app.name'))
@section('description', $template->description)

@push('styles')
    <style>
        /* 1. БАЗОВЫЕ ПЕРЕМЕННЫЕ СТИЛЕЙ (как на других страницах) */
        :root {
            --primary: #8b5cf6;
            --primary-hover: #7c3aed;
            --bg-primary: #ffffff;
            --bg-secondary: #faf7ff;
            --text-primary: #1e1b31;
            --text-secondary: #4c495d;
            --border: #e5e1f5;
            --shadow-lg: 0 10px 15px -3px rgb(139 92 246 / 0.15), 0 4px 6px -4px rgb(139 92 246 / 0.05);
            --gradient-brand: linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%);
        }
        [data-bs-theme="dark"] {
            --bg-primary: #0f0a1a;
            --bg-secondary: #1a1625;
            --text-primary: #f1f0ff;
            --text-secondary: #c9c6e0;
            --border: #2d2438;
        }

        /* 2. СТИЛИЗУЕМ СУЩЕСТВУЮЩИЕ ЭЛЕМЕНТЫ СТРАНИЦЫ */
        .page-layout {
            padding: 4rem 0;
            background-color: var(--bg-secondary);
        }
        .card.shadow-sm {
            background-color: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 24px;
            box-shadow: var(--shadow-lg) !important;
        }
        .card-header {
            background-color: transparent !important;
            border-bottom: 1px solid var(--border) !important;
            padding-top: 2rem !important;
            padding-bottom: 1rem !important;
        }
        .card-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            text-align: center;
        }
        .card-body {
            padding: 2.5rem !important;
        }

        /* Поля ввода и лейблы */
        .form-label {
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        .form-control {
            background-color: var(--bg-secondary) !important;
            border: 1px solid var(--border) !important;
            border-radius: 12px !important;
            padding: 0.75rem 1rem !important;
            color: var(--text-primary) !important;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .form-control:focus {
            outline: none !important;
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2) !important;
            background-color: var(--bg-primary) !important;
        }

        /* Кнопки */
        .btn-primary {
            border-radius: 16px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            background: var(--gradient-brand);
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }
        .btn-outline-secondary {
            border-radius: 16px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            background: transparent;
            border: 2px solid var(--border);
            color: var(--text-primary);
            transition: all 0.3s ease;
        }
        .btn-outline-secondary:hover {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }
    </style>
@endpush

@section('content')
    <div class="page-layout">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    {{-- ТВОЙ ОРИГИНАЛЬНЫЙ HTML ОСТАЛСЯ БЕЗ ИЗМЕНЕНИЙ --}}
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h1 class="h4 mb-0 text-center">{{ $template->title }}</h1>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-muted mb-4 text-center">{{ $template->description }}</p>

                            <form id="document-form" action="{{ route('templates.generate', ['locale' => app()->getLocale(), 'template' => $template->slug]) }}" method="POST">
                                @csrf

                                @php
                                    $fieldsJson = $template->getAttributes()['fields'] ?? '[]';
                                    $fields = json_decode($fieldsJson, true);
                                @endphp

                                @if(is_array($fields) && !empty($fields))
                                    @foreach($fields as $field)
                                        <div class="mb-3">
                                            <label for="{{ $field['name'] ?? '' }}" class="form-label">
                                                {{ $field['labels'][app()->getLocale()] ?? $field['name'] ?? 'Unnamed Field' }}
                                                @if($field['required'] ?? false) <span class="text-danger">*</span> @endif
                                            </label>
                                            @if(($field['type'] ?? 'text') === 'textarea')
                                                <textarea class="form-control" name="{{ $field['name'] ?? '' }}" rows="4">{{ old($field['name'] ?? '', $prefillData[$field['name'] ?? ''] ?? '') }}</textarea>
                                            @else
                                                <input type="{{ $field['type'] ?? 'text' }}" class="form-control" name="{{ $field['name'] ?? '' }}" value="{{ old($field['name'] ?? '', $prefillData[$field['name'] ?? ''] ?? '') }}">
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-warning">
                                        Для этого шаблона не настроены поля формы.
                                    </div>
                                @endif

                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" name="generate_pdf" value="1" class="btn btn-primary btn-lg">
                                        <i class="bi bi-file-earmark-pdf-fill me-2"></i> {{ __('messages.generate_pdf') }}
                                    </button>
                                    <button type="submit" name="generate_docx" value="1" class="btn btn-outline-secondary">
                                        <i class="bi bi-file-earmark-word-fill me-2"></i> {{ __('messages.generate_docx') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- ВЕСЬ ТВОЙ JAVASCRIPT ОСТАЛСЯ НЕИЗМЕННЫМ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('document-form');
            if (!form) return;

            const formFields = form.querySelectorAll('input[name]:not([type="hidden"]), textarea[name]');
            const storageKey = 'form_data_{{ $template->slug }}';

            const saveFormData = () => {
                const data = {};
                formFields.forEach(field => {
                    data[field.name] = field.value;
                });
                sessionStorage.setItem(storageKey, JSON.stringify(data));
            };

            const loadFormData = () => {
                const savedData = sessionStorage.getItem(storageKey);
                if (savedData) {
                    const data = JSON.parse(savedData);
                    formFields.forEach(field => {
                        if (data[field.name]) {
                            field.value = data[field.name];
                        }
                    });
                }
            };

            const clearFormData = () => {
                sessionStorage.removeItem(storageKey);
            };

            loadFormData();
            form.addEventListener('input', saveFormData);
            form.addEventListener('submit', () => {
                setTimeout(clearFormData, 500);
            });
        });
    </script>
@endpush
