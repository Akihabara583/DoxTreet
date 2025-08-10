@extends('layouts.app')

@section('title', __('messages.bundles_page_title') . ' - ' . config('app.name'))

@push('styles')
    <style>
        .blurred-content {
            filter: blur(5px);
            pointer-events: none;
            user-select: none;
        }
        .accordion-button:not(.collapsed) {
            color: var(--bs-primary);
            background-color: var(--bs-primary-bg-subtle);
        }
    </style>
@endpush

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold">{{ __('messages.bundles_page_title') }}</h1>
            <p class="lead text-muted">{{ __('messages.bundles_page_subtitle') }}</p>
        </div>

        @if($bundlesByCountry->isNotEmpty())
            <div class="accordion accordion-flush" id="bundlesAccordion">
                @foreach($bundlesByCountry as $countryCode => $bundles)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ $countryCode }}">
                            <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $countryCode }}">
                                <span class="me-3">{{ $countryCode === 'UA' ? '🇺🇦' : ($countryCode === 'PL' ? '🇵🇱' : '🇩🇪') }}</span>
                                {{ __('messages.bundles_for_country', ['country' => $countryNames[$countryCode][$locale] ?? $countryCode]) }}
                            </button>
                        </h2>
                        <div id="collapse-{{ $countryCode }}" class="accordion-collapse collapse" data-bs-parent="#bundlesAccordion">
                            <div class="accordion-body">
                                <div class="row row-cols-1 row-cols-lg-2 g-4 py-3">
                                    @foreach($bundles as $bundle)
                                        <div class="col">
                                            <div class="card h-100 shadow-sm">
                                                <div class="card-body d-flex flex-column">
                                                    <h4 class="card-title">{{ $bundle->title }}</h4>


                                                    <p class="mb-2 small"><strong>{{ __('messages.bundle_includes') }}</strong></p>

                                                    @if(Auth::check() && Auth::user()->hasProAccess())
                                                        <ul class="list-unstyled mb-4">
                                                            @foreach ($bundle->templates as $templateInBundle)
                                                                <li class="mb-1"><i class="bi bi-check-lg text-success"></i> {{ $templateInBundle->title }}</li>
                                                            @endforeach
                                                        </ul>
                                                        <a href="{{ route('bundles.show', ['locale' => $locale, 'bundle' => $bundle->slug]) }}" class="btn btn-primary mt-auto">
                                                            <i class="bi bi-magic"></i> {{ __('messages.fill_bundle') }}
                                                        </a>
                                                    @else
                                                        <ul class="list-unstyled mb-4 blurred-content">
                                                            @foreach ($bundle->templates as $templateInBundle)
                                                                <li class="mb-1"><i class="bi bi-check-lg text-success"></i> {{ $templateInBundle->title }}</li>
                                                            @endforeach
                                                        </ul>
                                                        <a href="{{ route('pricing', $locale) }}" class="btn btn-warning mt-auto">
                                                            <i class="bi bi-gem"></i> {{ __('messages.available_in_pro') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center">
                <p class="lead">{{ __('messages.no_bundles_available') }}</p>
            </div>
        @endif
    </div>
@endsection
