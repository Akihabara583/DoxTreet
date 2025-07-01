@extends('layouts.app')

@section('title', __('messages.manage_categories') . ' - ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>{{ __('messages.manage_categories') }}</h1>
            <a href="{{ route('admin.categories.create', app()->getLocale()) }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> {{ __('messages.add_category') }}
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('messages.name') }}</th>
                        <th scope="col">Slug</th>
                        <th scope="col">{{ __('messages.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', ['locale' => app()->getLocale(), 'category' => $category->slug]) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', ['locale' => app()->getLocale(), 'category' => $category->slug]) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('messages.are_you_sure') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{ __('messages.no_categories_found') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
