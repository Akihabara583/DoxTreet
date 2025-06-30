@extends('layouts.app')

@section('title', $template->title . ' - ' . config('app.name'))
@section('description', $template->description)

@section('hreflangs')
    @foreach(config('app.available_locales') as $lang)
        <link rel="alternate" hreflang="{{ $lang }}" href="{{ route('templates.show', ['locale' => $lang, 'template' => $template->slug]) }}" />
    @endforeach
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">

                @include('partials.breadcrumbs', ['items' => [
                    ['name' => __('messages.home'), 'url' => route('home', app()->getLocale())],
                    ['name' => $template->category->name, 'url' => route('home', app()->getLocale()) . '#category-' . $template->category->id],
                    ['name' => $template->title]
                ]])

                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h1 class="h4 mb-0">{{ $template->title }}</h1>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text text-muted mb-4">{{ $template->description }}</p>

                        @if(!auth()->check())
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle-fill"></i>
                                {{ __('messages.rate_limit_info') }}
                                <a href="{{ route('register', app()->getLocale()) }}" class="alert-link">{{ __('messages.register') }}</a>
                                {{ __('messages.for_unlimited_access') }}.
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('templates.generate', ['locale' => app()->getLocale(), 'template' => $template->slug]) }}" method="POST">
                            @csrf

                            @foreach(json_decode($template->fields, true) as $field)
                                <div class="mb-3">
                                    <label for="{{ $field['name'] }}" class="form-label">
                                        {{ $field['labels'][app()->getLocale()] ?? $field['name'] }}
                                        @if($field['required']) <span class="text-danger">*</span> @endif
                                    </label>
                                    @if($field['type'] === 'textarea')
                                        {{-- ИЗМЕНЕНО: Используем $prefillData для автозаполнения --}}
                                        <textarea class="form-control @error($field['name']) is-invalid @enderror" id="{{ $field['name'] }}" name="{{ $field['name'] }}" rows="4" {{ $field['required'] ? 'required' : '' }}>{{ old($field['name'], $prefillData[$field['name']] ?? '') }}</textarea>
                                    @else
                                        {{-- ИЗМЕНЕНО: Используем $prefillData для автозаполнения --}}
                                        <input type="{{ $field['type'] }}" class="form-control @error($field['name']) is-invalid @enderror" id="{{ $field['name'] }}" name="{{ $field['name'] }}" value="{{ old($field['name'], $prefillData[$field['name']] ?? '') }}" {{ $field['required'] ? 'required' : '' }}>
                                    @endif

                                    @error($field['name'])
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="d-grid gap-2">
                                <button type="submit" formaction="{{ route('templates.generate', ['locale' => app()->getLocale(), 'template' => $template->slug]) }}" class="btn btn-primary btn-lg">
                                    <i class="bi bi-file-earmark-pdf-fill"></i> {{ __('messages.generate_pdf') }}
                                </button>
                                {{-- ИЗМЕНЕНИЕ: Текст кнопки теперь берется из файлов перевода --}}
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
