@extends('layouts.app')

@section('title', __('messages.error_403_title') . ' - ' . config('app.name'))
@section('description', __('messages.error_403_description'))

@section('content')
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <h1 class="display-1 fw-bold">403</h1>
                        <h2 class="h3">{{ __('messages.error_403_title') }}</h2>
                        <p class="lead text-muted">
                            {{ __('messages.error_403_text') }}
                        </p>
                        <a href="{{ route('home', app()->getLocale()) }}" class="btn btn-primary mt-3">
                            <i class="bi bi-house-door-fill"></i> {{ __('messages.go_home') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
