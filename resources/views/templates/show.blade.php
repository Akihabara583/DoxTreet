{{-- Это финальный и правильный код для resources/views/templates/generate.blade.php --}}
@extends('layouts.app')

@section('title', $template->title . ' - ' . config('app.name'))
@section('description', $template->description)

{{-- ... секция @hreflangs ... --}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">

                {{-- ... секция хлебных крошек и заголовка ... --}}

                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h1 class="h4 mb-0">{{ $template->title }}</h1>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text text-muted mb-4">{{ $template->description }}</p>

                        {{-- ... секция уведомлений для гостей ... --}}

                        <form action="{{ route('templates.generate', ['locale' => app()->getLocale(), 'template' => $template->slug]) }}" method="POST">
                            @csrf

                            @php
                                // Надежно получаем JSON из базы
                                $fieldsJson = $template->getAttributes()['fields'] ?? '[]';
                                $fields = json_decode($fieldsJson, true);
                            @endphp

                            {{-- ГЛАВНАЯ ЛОГИКА: --}}
                            {{-- 1. Если JSON с полями существует в базе, строим форму по нему --}}
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
                                {{-- 2. Если JSON в базе пустой, показываем это сообщение --}}
                                <div class="alert alert-warning">
                                    Для этого шаблона не настроены поля формы. Пожалуйста, добавьте их в админ-панели.
                                </div>
                            @endif

                            {{-- Кнопки отправки --}}
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" formaction="{{ route('templates.generate', ['locale' => app()->getLocale(), 'template' => $template->slug]) }}" class="btn btn-primary btn-lg">
                                    <i class="bi bi-file-earmark-pdf-fill"></i> {{ __('messages.generate_pdf') }}
                                </button>
                                <button type="submit" formaction="{{ route('templates.generate.docx', ['locale' => app()->getLocale(), 'template' => $template->slug]) }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-file-earmark-word-fill"></i> {{ __('messages.download_docx') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
