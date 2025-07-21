@extends('layouts.app')

@section('title', __('messages.signed_documents') . ' - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        <div class="row">
            {{-- Боковое меню --}}
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('profile.show', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.show') ? 'active' : '' }}">
                        <i class="bi bi-person-circle"></i> {{ __('messages.overview') }}
                    </a>
                    <a href="{{ route('profile.edit', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <i class="bi bi-pencil-square"></i> {{ __('messages.edit_profile') }}
                    </a>
                    <a href="{{ route('profile.history', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.history') ? 'active' : '' }}">
                        <i class="bi bi-clock-history"></i> {{ __('messages.document_history') }}
                    </a>
                    {{-- ✅ ИСПРАВЛЕНИЕ 1: Это правильная ссылка на страницу истории --}}
                    <a href="{{ route('profile.signed-documents.history', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.signed-documents.history') ? 'active' : '' }}">
                        <i class="bi bi-pen"></i> {{ __('messages.signed_documents') }}
                    </a>
                    <a href="{{ route('profile.my-data', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-data') ? 'active' : '' }}">
                        <i class="bi bi-safe"></i> {{ __('messages.my_data') }}
                    </a>
                    <a href="{{ route('pricing', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('pricing') ? 'active' : '' }}">
                        <i class="bi bi-gem"></i> {{ __('messages.my_subscription') }}
                    </a>
                    <a href="{{ route('profile.my-templates.index', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.index') ? 'active' : '' }}">
                        <i class="bi bi-collection me-2"></i> {{ __('messages.my_templates') }}
                    </a>
                    <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.create') ? 'active' : '' }}">
                        <i class="bi bi-plus-circle me-2"></i> {{ __('messages.create_template') }}
                    </a>
                </div>
            </div>

            {{-- Таблица с историей --}}
            <div class="col-md-9">
                <h2>{{ __('messages.signed_documents') }}</h2>
                <p class="text-muted">{{ __('messages.signed_documents_history_text') }}</p>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('messages.document_name') }}</th>
                                    <th>{{ __('messages.signing_date') }}</th>
                                    <th>{{ __('messages.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($documents as $document)
                                    <tr>
                                        <td>{{ $document->original_filename }}</td>
                                        <td>{{ $document->created_at->format('d.m.Y H:i') }}</td>
                                        <td>
                                            {{-- ✅ ИСПРАВЛЕНИЕ 2: Это правильная ссылка для скачивания документа из строки таблицы --}}
                                            <a href="{{ route('profile.signed-documents.download', ['locale' => app()->getLocale(), 'document' => $document->id]) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-download"></i> {{ __('messages.download') }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">{{ __('messages.no_signed_documents_yet') }}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $documents->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
