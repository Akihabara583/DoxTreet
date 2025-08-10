{{-- resources/views/bundles/show.blade.php --}}

@extends('layouts.app')

@section('title', $bundle->title)

@section('content')
    <div class="container py-4">
        {{--
          Livewire компонент получает переменную $bundle напрямую из контроллера.
          Внутри компонента она будет доступна через метод mount($bundle).
        --}}
        @livewire('document-bundle-wizard', ['bundle' => $bundle])
    </div>
@endsection
