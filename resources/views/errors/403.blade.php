@extends('layouts.app')

@section('title', __('messages.error_403_title') . ' - ' . config('app.name'))
@section('description', __('messages.error_403_description'))

@push('styles')
    <style>
        .error-page-section {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 70vh;
            background-color: var(--bg-secondary, #faf7ff);
            padding: 4rem 0;
        }
        .error-container {
            text-align: center;
            max-width: 600px;
            /* FIX: Added auto margins to horizontally center the container */
            margin: 0 auto;
        }
        .error-code {
            font-size: 6rem;
            font-weight: 900;
            line-height: 1;
            background: var(--gradient-brand, linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }
        .error-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary, #1e1b31);
            margin-bottom: 1rem;
        }
        .error-text {
            font-size: 1.1rem;
            color: var(--text-secondary, #4c495d);
            margin-bottom: 2rem;
        }
        .btn-modern {
            border-radius: 16px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-primary-modern {
            background: var(--gradient-brand, linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%));
            color: white;
        }
        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
            color: white;
        }
    </style>
@endpush

@section('content')
    <div class="error-page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="error-container">
                        <div class="error-code">403</div>
                        <h2 class="error-title">{{ __('messages.error_403_title') }}</h2>
                        <p class="error-text">
                            {{ __('messages.error_403_text') }}
                        </p>
                        <a href="{{ route('home', app()->getLocale()) }}" class="btn btn-modern btn-primary-modern">
                            <i class="bi bi-house-door-fill me-2"></i> {{ __('messages.go_home') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
