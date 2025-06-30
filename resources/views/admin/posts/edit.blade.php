@extends('layouts.app')

@section('title', 'Редактировать статью')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Редактировать статью: {{ $post->title }}</h1>

        <form action="{{ route('admin.posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.posts._form')
        </form>
    </div>
@endsection
