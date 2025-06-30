@extends('layouts.app')

@section('title', __('messages.manage_templates') . ' - ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>{{ __('messages.manage_templates') }}</h1>
            <a href="{{ route('admin.templates.create', app()->getLocale()) }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> {{ __('messages.add_template') }}
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('messages.title') }}</th>
                        <th scope="col">{{ __('messages.category') }}</th>
                        <th scope="col">{{ __('messages.status') }}</th>
                        <th scope="col">{{ __('messages.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($templates as $template)
                        <tr>
                            <th scope="row">{{ $template->id }}</th>
                            <td>{{ $template->title }}</td>
                            <td>{{ $template->category->name }}</td>
                            <td>
                                @if($template->is_active)
                                    <span class="badge bg-success">{{ __('messages.active') }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ __('messages.inactive') }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.templates.edit', ['locale' => app()->getLocale(), 'template' => $template->id]) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('admin.templates.destroy', ['locale' => app()->getLocale(), 'template' => $template->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('messages.are_you_sure') }}');">
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
                            <td colspan="5">{{ __('messages.no_templates_found') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            {{ $templates->links() }}
        </div>
    </div>
@endsection
