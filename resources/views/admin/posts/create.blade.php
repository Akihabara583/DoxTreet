@extends('layouts.app')

@section('title', 'Создать новую статью')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Создать новую статью</h1>

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @include('admin.posts._form')
        </form>
    </div>
@endsection
