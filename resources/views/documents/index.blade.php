@extends('layouts.app')

@section('title', __('messages.all_templates') . ' - ' . config('app.name'))

@push('styles')
    <style>
        .page-layout {
            padding: 4rem 0;
            background-color: var(--bg-secondary);
        }
        .content-box {
            background-color: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
        }
        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 3rem;
            color: var(--text-primary);
        }
        .country-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid var(--border);
            padding-bottom: 1rem;
            color: var(--text-primary);
        }
        .document-list {
            list-style: none;
            padding-left: 0;
        }
        .document-list li a {
            display: block;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .document-list li a:hover {
            background-color: var(--bg-secondary);
            color: var(--primary);
            transform: translateX(5px);
        }
    </style>
@endpush

@section('content')
    <div class="page-layout">
        <div class="container">
            <h1 class="page-title">{{ __('messages.all_templates') }}</h1>

            <div class="content-box">
                @forelse ($countries as $country)
                    <div class="mb-5">
                        <h2 class="country-title">
                            {{-- <span class="fi fi-{{ strtolower($country['code']) }} me-3"></span> --}}
                            {{ $country['name'] }}
                        </h2>

                        @if(empty($country['documents']))
                            <p class="text-muted">{{ __('messages.no_templates_for_country') }}</p>
                        @else
                            <ul class="document-list">
                                @foreach ($country['documents'] as $document)
                                    <li>
                                        <a href="{{ route('documents.show', ['locale' => $currentLocale, 'countryCode' => $country['code'], 'templateSlug' => $document->slug]) }}">
                                            {{ $document->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @empty
                    <p class="text-center text-muted fs-5">{{ __('messages.no_templates_for_country') }}</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
