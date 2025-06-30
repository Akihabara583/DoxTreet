@extends('layouts.app')

@section('title', __('messages.admin_panel') . ' - ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('admin.dashboard', app()->getLocale()) }}" class="list-group-item list-group-item-action active" aria-current="true">
                        <i class="bi bi-speedometer2"></i> {{ __('messages.dashboard') }}
                    </a>
                    <a href="{{ route('admin.categories.index', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-tags"></i> {{ __('messages.categories') }}
                    </a>
                    <a href="{{ route('admin.templates.index', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-file-earmark-text"></i> {{ __('messages.templates') }}
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <h1><i class="bi bi-speedometer2"></i> {{ __('messages.dashboard') }}</h1>
                <p>{{ __('messages.admin_welcome') }}</p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ \App\Models\Template::count() }}</h5>
                                <p class="card-text">{{ __('messages.total_templates') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ \App\Models\Category::count() }}</h5>
                                <p class="card-text">{{ __('messages.total_categories') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
