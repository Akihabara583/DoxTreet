@extends('layouts.app')

@section('title', $templateModel->title . ' - ' . config('app.name'))

@push('styles')
    <style>
        :root {
            --primary: #8b5cf6;
            --primary-hover: #7c3aed;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --blue: #06b6d4;
            --blue-dark: #0891b2;

            --bg-primary: #ffffff;
            --bg-secondary: #faf7ff;
            --bg-tertiary: #f3f0ff;
            --text-primary: #1e1b31;
            --text-secondary: #4c495d;
            --text-muted: #6b7280;
            --border: #e5e1f5;
            --shadow-sm: 0 1px 2px 0 rgb(139 92 246 / 0.05);
            --shadow: 0 4px 6px -1px rgb(139 92 246 / 0.1), 0 2px 4px -2px rgb(139 92 246 / 0.05);
            --shadow-lg: 0 10px 15px -3px rgb(139 92 246 / 0.15), 0 4px 6px -4px rgb(139 92 246 / 0.05);
            --shadow-xl: 0 20px 25px -5px rgb(139 92 246 / 0.2), 0 8px 10px -6px rgb(139 92 246 / 0.1);

            --gradient-brand: linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%);
        }

        [data-bs-theme="dark"] {
            --bg-primary: #0f0a1a;
            --bg-secondary: #1a1625;
            --bg-tertiary: #252031;
            --text-primary: #f1f0ff;
            --text-secondary: #c9c6e0;
            --text-muted: #9490a8;
            --border: #2d2438;
        }

        .modern-section {
            padding: 4rem 0;
            background-color: var(--bg-secondary);
        }

        .form-container {
            background-color: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
        }

        .form-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .form-description {
            text-align: center;
            color: var(--text-secondary);
            margin-bottom: 2.5rem;
        }

        .modern-form-label {
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .modern-form-control {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            color: var(--text-primary);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            width: 100%;
        }

        .modern-form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2);
            background-color: var(--bg-primary);
        }

        .modern-form-control.is-invalid {
            border-color: var(--danger);
        }

        .invalid-feedback {
            color: var(--danger);
            font-size: 0.875em;
            margin-top: 0.25rem;
        }

        .btn-modern {
            border-radius: 16px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .btn-primary-modern {
            background: var(--gradient-brand);
            color: white;
        }

        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        .btn-outline-modern {
            background: transparent;
            border: 2px solid var(--border);
            color: var(--text-primary);
        }

        .btn-outline-modern:hover {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
            transform: translateY(-2px);
        }
    </style>
@endpush

@section('content')
    <div class="modern-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-container">
                        <h1 class="form-title">{{ $templateModel->title }}</h1>
                        @if($templateModel->description)
                            <p class="form-description">{{ $templateModel->description }}</p>
                        @endif

                        <form id="document-form" action="{{ route('documents.generate', ['locale' => $currentLocale, 'countryCode' => $templateModel->country_code, 'templateSlug' => $templateModel->slug]) }}" method="POST">
                            @csrf

                            @php
                                $fields = $templateModel->fields ?? [];
                            @endphp

                            @if(is_array($fields) && !empty($fields))
                                @foreach($fields as $field)
                                    @php
                                        $label = $field['labels'][$currentLocale] ?? $field['name'];
                                        $isRequired = $field['required'] ?? false;
                                        $fieldName = $field['name'];
                                        $fieldValue = old($fieldName, $prefillData[$fieldName] ?? '');
                                    @endphp

                                    <div class="mb-4">
                                        <label for="{{ $fieldName }}" class="form-label modern-form-label">
                                            {{ $label }}
                                            @if($isRequired)
                                                <span style="color: var(--danger);">*</span>
                                            @endif
                                        </label>

                                        @if(($field['type'] ?? 'text') === 'textarea')
                                            <textarea id="{{ $fieldName }}"
                                                      name="{{ $fieldName }}"
                                                      rows="4"
                                                      class="form-control modern-form-control @error($fieldName) is-invalid @enderror"
                                                      @if($isRequired) required @endif>{{ $fieldValue }}</textarea>
                                        @else
                                            <input type="{{ $field['type'] ?? 'text' }}"
                                                   id="{{ $fieldName }}"
                                                   name="{{ $fieldName }}"
                                                   class="form-control modern-form-control @error($fieldName) is-invalid @enderror"
                                                   value="{{ $fieldValue }}"
                                                   @if($isRequired) required @endif>
                                        @endif

                                        @error($fieldName)
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-warning" style="background-color: var(--bg-tertiary); border-color: var(--warning); color: var(--text-primary);">
                                    Для этого шаблона не настроены поля формы.
                                </div>
                            @endif

                            <hr class="my-4" style="border-color: var(--border);">

                            <div class="d-grid gap-3">
                                <button type="submit" name="generate_pdf" value="1" class="btn btn-primary-modern btn-modern">
                                    <i class="bi bi-file-earmark-pdf-fill me-2"></i> {{ __('messages.generate_pdf') }}
                                </button>
                                <button type="submit" name="generate_docx" value="1" class="btn btn-outline-modern btn-modern">
                                    <i class="bi bi-file-earmark-word-fill me-2"></i> {{ __('messages.download_docx') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('document-form');
            if (!form) return;

            // Передаем из PHP в JavaScript, залогинен ли пользователь
            const isUserLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

            const storageKey = 'form_data_{{ $templateModel->id }}';

            // Функция для загрузки данных и заполнения формы
            function loadFormData() {
                const savedData = sessionStorage.getItem(storageKey);
                if (savedData) {
                    const data = JSON.parse(savedData);
                    for (const key in data) {
                        const field = form.querySelector(`[name="${key}"]`);
                        if (field && !field.value) { // Заполняем только если поле пустое
                            field.value = data[key];
                        }
                    }
                }
            }

            // Функция для сохранения данных формы
            function saveFormData() {
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());
                // Удаляем CSRF токен, чтобы не хранить лишнее
                delete data._token;
                sessionStorage.setItem(storageKey, JSON.stringify(data));
            }

            // Загружаем данные при открытии страницы
            loadFormData();

            // Сохраняем данные каждый раз, когда пользователь что-то вводит
            form.addEventListener('input', saveFormData);

            // Вешаем обработчик на отправку формы
            form.addEventListener('submit', function() {
                // Очищаем данные ТОЛЬКО если пользователь уже залогинен.
                // Если это гость, данные останутся в хранилище для восстановления.
                if (isUserLoggedIn) {
                    setTimeout(() => {
                        sessionStorage.removeItem(storageKey);
                    }, 500);
                }
            });
        });
    </script>
@endpush
