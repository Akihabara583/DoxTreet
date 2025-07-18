@extends('layouts.app')

@section('title', $title . ' - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="card-body">
                        {{-- Используем {!! !!} для рендеринга HTML-тегов из перевода --}}
                        {!! $content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
