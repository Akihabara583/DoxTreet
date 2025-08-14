@extends('layouts.app')

@section('title', $bundle->title)

@push('styles')
    <style>
        :root {
            --bg-secondary: #faf7ff;
        }
        [data-bs-theme="dark"] {
            --bg-secondary: #1a1625;
        }
        .modern-section {
            padding: 4rem 0;
            background-color: var(--bg-secondary);
            min-height: 80vh;
        }
    </style>
@endpush

@section('content')
    <div class="modern-section">
        <div class="container">
            {{--
              Livewire компонент получает переменную $bundle напрямую из контроллера.
              Внутри компонента она будет доступна через метод mount($bundle).
              Стили для самого визарда должны быть определены внутри Livewire компонента.
            --}}
            @livewire('document-bundle-wizard', ['bundle' => $bundle])
        </div>
    </div>
@endsection
