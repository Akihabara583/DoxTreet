@extends('layouts.app')

@section('title', $template->title . ' - ' . config('app.name'))
@section('description', $template->description)

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h1 class="h4 mb-0">{{ $template->title }}</h1>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text text-muted mb-4">{{ $template->description }}</p>

                        {{-- ✅ ИЗМЕНЕНИЕ 1: Добавлен id="document-form" --}}
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
                                    <i class="bi bi-file-earmark-pdf-fill"></i> {{ __('messages.generate_pdf') }}
                                </button>
                                <button type="submit" name="generate_docx" value="1" class="btn btn-outline-secondary">
                                    <i class="bi bi-file-earmark-word-fill"></i> {{ __('messages.generate_docx') }}
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
