@extends('layouts.app')

@section('title', $templateModel->title . ' - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-light py-3">
                        <h1 class="h4 mb-0">{{ $templateModel->title }}</h1>
                    </div>
                    <div class="card-body p-4">
                        @if($templateModel->description)
                            <p class="text-muted mb-4">{{ $templateModel->description }}</p>
                        @endif

                        {{-- ✅ ИЗМЕНЕНИЕ 1: Добавлен id="document-form" --}}
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

                                    <div class="mb-3">
                                        <label for="{{ $fieldName }}" class="form-label">
                                            {{ $label }}
                                            @if($isRequired)
                                                <span class="text-danger">*</span>
                                            @endif
                                        </label>

                                        @if(($field['type'] ?? 'text') === 'textarea')
                                            <textarea id="{{ $fieldName }}"
                                                      name="{{ $fieldName }}"
                                                      rows="4"
                                                      class="form-control @error($fieldName) is-invalid @enderror"
                                                      @if($isRequired) required @endif>{{ $fieldValue }}</textarea>
                                        @else
                                            <input type="{{ $field['type'] ?? 'text' }}"
                                                   id="{{ $fieldName }}"
                                                   name="{{ $fieldName }}"
                                                   class="form-control @error($fieldName) is-invalid @enderror"
                                                   value="{{ $fieldValue }}"
                                                   @if($isRequired) required @endif>
                                        @endif

                                        @error($fieldName)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-warning">
                                    Для этого шаблона не настроены поля формы.
                                </div>
                            @endif

                            <hr class="my-4">

                            <div class="d-grid gap-2">
                                <button type="submit" name="generate_pdf" value="1" class="btn btn-primary btn-lg">
                                    <i class="bi bi-file-earmark-pdf-fill me-2"></i> {{ __('messages.generate_pdf') }}
                                </button>
                                <button type="submit" name="generate_docx" value="1" class="btn btn-outline-secondary">
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

{{-- ✅ ИЗМЕНЕНИЕ 2: Добавлен скрипт сохранения данных --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('document-form');
            if (!form) return;

            const formFields = form.querySelectorAll('input[name]:not([type="hidden"]), textarea[name]');
            const storageKey = 'form_data_{{ $templateModel->slug }}';

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
