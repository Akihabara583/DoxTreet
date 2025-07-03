@extends('layouts.app')

@section('title', __('messages.docs_for') . ' ' . $countryName . ' - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        {{-- ✅ ВИПРАВЛЕНО: Заголовок тепер використовує переклади --}}
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold">{{ __('messages.template_catalog') }}</h1>
            <p class="lead text-muted">{{ __('messages.docs_for') }} {{ $countryName }}</p>
        </div>

        @if($categories->isEmpty())
            <p class="text-center text-muted mt-5">{{ __('messages.no_templates_for_country') }}</p>
        @else
            @foreach($categories as $category)
                <div class="mb-5">
                    {{-- Заголовок категорії --}}
                    <h2 class="h4 mb-4 fw-bold">
                        {{-- <i class="bi bi-folder me-2"></i> --}}
                        {{ $category->name }}
                    </h2>

                    {{-- Сетка с карточками шаблонов --}}
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach($category->templates as $template)
                            <div class="col">
                                <div class="card h-100 shadow-sm border-light">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $template->title }}</h5>
                                        <p class="card-text small text-muted flex-grow-1">{{ $template->description }}</p>
                                        <a href="{{ route('documents.show', ['locale' => $currentLocale, 'countryCode' => $template->country_code, 'templateSlug' => $template->slug]) }}" class="btn btn-outline-primary btn-sm mt-auto align-self-start">
                                            {{ __('messages.fill_out') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
