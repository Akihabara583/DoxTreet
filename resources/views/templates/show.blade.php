@extends('layouts.app')

@section('title', $template->title . ' - ' . config('app.name'))
@section('description', $template->description)

{{-- ... (здесь может быть ваша секция @hreflangs, если она есть) ... --}}

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">

                {{-- ... (здесь может быть ваша секция хлебных крошек, если она есть) ... --}}

                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h1 class="h4 mb-0">{{ $template->title }}</h1>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text text-muted mb-4">{{ $template->description }}</p>

                        {{-- ... (здесь может быть ваша секция для гостей, если она есть) ... --}}

                        {{-- ✅ ИСПРАВЛЕНИЕ 1: Форма отправляется на ЕДИНЫЙ правильный маршрут --}}
                        <form action="{{ route('templates.generate', ['locale' => app()->getLocale(), 'template' => $template->slug]) }}" method="POST">
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
                                    Для этого шаблона не настроены поля формы. Пожалуйста, добавьте их в админ-панели.
                                </div>
                            @endif

                            {{-- ✅ ИСПРАВЛЕНИЕ 2: Убрали `formaction` и добавили `name` --}}
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
