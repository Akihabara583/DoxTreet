@extends('layouts.app')

@section('title', 'Управление статьями')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('admin.partials._sidebar')
            </div>
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1><i class="bi bi-newspaper"></i> Управление статьями</h1>
                    <a href="{{ route('admin.posts.create', ['locale' => app()->getLocale()]) }}" class="btn btn-primary">Создать новую статью</a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Заголовок</th>
                                    <th>Статус</th>
                                    <th>Дата создания</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            @if ($post->is_published)
                                                <span class="badge bg-success">Опубликовано</span>
                                            @else
                                                <span class="badge bg-secondary">Черновик</span>
                                            @endif
                                        </td>
                                        <td>{{ $post->created_at->format('d.m.Y H:i') }}</td>
                                        <td>
                                            {{-- ИСПРАВЛЕНИЕ ЗДЕСЬ: Добавляем 'locale' в параметры маршрута --}}
                                            <a href="{{ route('admin.posts.edit', ['locale' => app()->getLocale(), 'post' => $post->id]) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="{{ route('admin.posts.destroy', ['locale' => app()->getLocale(), 'post' => $post->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту статью?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Статей пока нет.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
