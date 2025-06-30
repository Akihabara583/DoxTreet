@extends('layouts.app')

@section('title', __('messages.admin_panel') . ' - ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('admin.partials._sidebar')
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
