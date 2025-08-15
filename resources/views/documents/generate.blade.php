@extends('layouts.app')

@section('content')
    @php
        $documentTitle = $template['localization'][$currentLocale]['document_title']
                         ?? $template['template_info']['name']
                         ?? 'Document Generator';
    @endphp

    @section('title', $documentTitle . ' - ' . config('app.name'))

    @push('styles')
        <style>
            .page-layout { padding: 4rem 0; background-color: var(--bg-secondary); }
            .form-container { background-color: var(--bg-primary); border: 1px solid var(--border); border-radius: 24px; padding: 2.5rem; box-shadow: var(--shadow-lg); }
            .form-title { font-size: 2rem; font-weight: 700; color: var(--text-primary); text-align: center; margin-bottom: 2rem; }
            .section-title { font-size: 1.5rem; font-weight: 600; margin-top: 2rem; margin-bottom: 1.5rem; border-bottom: 1px solid var(--border); padding-bottom: 0.75rem; color: var(--text-primary); }
            .static-text { margin-top: 1rem; font-size: 0.9rem; color: var(--text-secondary); background-color: var(--bg-secondary); padding: 1rem; border-radius: 12px; }
        </style>
    @endpush

    <div class="page-layout">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="form-container">
                        <h1 class="form-title">{{ $documentTitle }}</h1>

                        <form action="{{ route('documents.generate', ['locale' => $currentLocale, 'countryCode' => $countryCode, 'templateSlug' => $templateSlug]) }}" method="POST">
                            @csrf

                            @foreach($template['structure'] as $field)
                                @php
                                    $label = $template['localization'][$currentLocale][$field['id']] ?? $field['id'];
                                    $isRequired = $field['required'] ?? false;
                                @endphp

                                @switch($field['type'])
                                    @case('section')
                                        <h2 class="section-title">{{ $label }}</h2>
                                        @break

                                    @case('text')
                                    @case('email')
                                    @case('tel')
                                        <div class="mb-4">
                                            <label for="{{ $field['id'] }}" class="form-label modern-form-label">
                                                {{ $label }} @if($isRequired)<span class="text-danger">*</span>@endif
                                            </label>
                                            <input type="{{ $field['type'] }}" id="{{ $field['id'] }}" name="{{ $field['id'] }}" class="form-control modern-form-control" @if($isRequired) required @endif>
                                        </div>
                                        @break

                                    @case('textarea')
                                        <div class="mb-4">
                                            <label for="{{ $field['id'] }}" class="form-label modern-form-label">
                                                {{ $label }} @if($isRequired)<span class="text-danger">*</span>@endif
                                            </label>
                                            <textarea id="{{ $field['id'] }}" name="{{ $field['id'] }}" rows="4" class="form-control modern-form-control" @if($isRequired) required @endif></textarea>
                                        </div>
                                        @break

                                    @case('static_text')
                                        <p class="static-text">{{ $label }}</p>
                                        @break

                                    @case('image')
                                        <div class="mb-4">
                                            <label for="{{ $field['id'] }}" class="form-label modern-form-label">{{ $label }}</label>
                                            <input type="file" id="{{ $field['id'] }}" name="{{ $field['id'] }}" class="form-control modern-form-control" accept="image/*">
                                        </div>
                                        @break
                                @endswitch
                            @endforeach

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary-modern btn-modern btn-lg">
                                    Сгенерировать документ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
