@extends('layouts.app')

@section('title', $title . ' - ' . config('app.name'))

@push('styles')
    <style>
        .modern-section {
            background-color: var(--bg-secondary, #faf7ff);
            padding: 4rem 0;
        }
        .content-container {
            background-color: var(--bg-primary, #fff);
            border-radius: 24px;
            padding: 2.5rem;
            border: 1px solid var(--border, #e5e1f5);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
        }
        .content-body h1, .content-body h2, .content-body h3 {
            color: var(--text-primary, #1e1b31);
            font-weight: 700;
            margin-top: 1.5em;
            margin-bottom: 0.8em;
        }
        .content-body p {
            line-height: 1.7;
            margin-bottom: 1.25rem;
            color: var(--text-secondary, #4c495d);
        }
        .content-body a {
            color: var(--primary, #8b5cf6);
            text-decoration: none;
            font-weight: 600;
            border-bottom: 2px solid rgba(139, 92, 246, 0.2);
            transition: all 0.2s ease-in-out;
        }
        .content-body a:hover {
            background-color: rgba(139, 92, 246, 0.1);
        }
        .content-body ul, .content-body ol {
            padding-left: 2rem;
            margin-bottom: 1.25rem;
            color: var(--text-secondary, #4c495d);
        }
    </style>
@endpush

@section('content')
    <div class="modern-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="content-container">
                        <h1 class="h2 mb-4" style="color: var(--text-primary); font-weight: 700;">{{ $title }}</h1>
                        <hr style="border-color: var(--border, #e5e1f5);">
                        <div class="content-body mt-4">
                            {{-- We use {!! !!} to render HTML tags from the translation --}}
                            {!! $content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
