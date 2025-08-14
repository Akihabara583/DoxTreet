@extends('layouts.app')

@section('title', __('messages.my_templates_title') . ' - ' . config('app.name'))

@push('styles')
    <style>
        .profile-layout {
            background-color: var(--bg-secondary, #faf7ff);
            padding: 4rem 0;
        }
        .profile-sidebar .list-group-item {
            border-radius: 12px;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-secondary, #4c495d);
            border: 1px solid transparent;
            transition: all 0.3s ease;
        }
        .profile-sidebar .list-group-item i {
            margin-right: 1rem;
            width: 20px;
        }
        .profile-sidebar .list-group-item:hover {
            background-color: var(--bg-primary, #fff);
            color: var(--primary, #8b5cf6);
            transform: translateX(5px);
        }
        .profile-sidebar .list-group-item.active {
            background-color: var(--primary, #8b5cf6);
            color: white;
            border-color: var(--primary, #8b5cf6);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
        }
        .profile-content {
            background-color: var(--bg-primary, #fff);
            border-radius: 24px;
            padding: 2.5rem;
            border: 1px solid var(--border, #e5e1f5);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
        }
        .table-modern {
            color: var(--text-secondary, #4c495d);
        }
        .table-modern thead th {
            border-bottom: 2px solid var(--border, #e5e1f5);
            color: var(--text-primary, #1e1b31);
            font-weight: 600;
        }
        .table-modern tbody tr:hover {
            background-color: var(--bg-secondary, #faf7ff);
        }
        .btn-modern {
            border-radius: 12px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.875rem;
        }
        .btn-primary-modern {
            background: var(--gradient-brand, linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%));
            color: white;
        }
        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
            color: white;
        }
        .btn-group .btn {
            margin-right: 0.5rem;
            border-radius: 8px !important;
        }
    </style>
@endpush

@section('content')
    <div class="profile-layout">
        <div class="container">
            <div class="row">
                {{-- Sidebar --}}
                <div class="col-md-3">
                    <div class="list-group profile-sidebar">
                        <a href="{{ route('profile.show', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.show') ? 'active' : '' }}">
                            <i class="bi bi-person-circle"></i> {{ __('messages.overview') }}
                        </a>
                        <a href="{{ route('profile.edit', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                            <i class="bi bi-pencil-square"></i> {{ __('messages.edit_profile') }}
                        </a>
                        <a href="{{ route('profile.history', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.history') ? 'active' : '' }}">
                            <i class="bi bi-clock-history"></i> {{ __('messages.document_history') }}
                        </a>
                        <a href="{{ route('profile.my-data', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-data') ? 'active' : '' }}">
                            <i class="bi bi-safe"></i> {{ __('messages.my_data') }}
                        </a>
                        <a href="{{ route('profile.subscription', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.subscription') ? 'active' : '' }}">
                            <i class="bi bi-gem"></i> {{ __('messages.my_subscription') }}
                        </a>
                        <a href="{{ route('profile.signed-documents.history', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.signed-documents.history') ? 'active' : '' }}">
                            <i class="bi bi-pen"></i> {{ __('messages.signed_documents') }}
                        </a>
                        <a href="{{ route('profile.my-templates.index', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.*') && !request()->routeIs('profile.my-templates.create') ? 'active' : '' }}">
                            <i class="bi bi-collection"></i> {{ __('messages.my_templates') }}
                        </a>
                        <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.create') ? 'active' : '' }}">
                            <i class="bi bi-plus-circle"></i> {{ __('messages.create_template') }}
                        </a>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="col-md-9">
                    <div class="profile-content">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h1 class="h3 mb-0" style="color: var(--text-primary);">{{ __('messages.my_templates_header') }}</h1>
                            <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}" class="btn btn-primary-modern btn-modern">
                                <i class="bi bi-plus-lg me-2"></i> {{ __('messages.create_new_template_button') }}
                            </a>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($userTemplates->isEmpty())
                            <div class="text-center py-5">
                                <p>{{ __('messages.no_templates_yet_text') }} <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}">{{ __('messages.create_first_template_link') }}</a>.</p>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle table-modern">
                                    <thead>
                                    <tr>
                                        <th>{{ __('messages.table_header_name') }}</th>
                                        <th>{{ __('messages.table_header_category') }}</th>
                                        <th>{{ __('messages.table_header_country') }}</th>
                                        <th class="text-end">{{ __('messages.table_header_actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userTemplates as $template)
                                        <tr>
                                            <td>{{ $template->name }}</td>
                                            <td>{{ $template->category->getTranslation('name', app()->getLocale()) ?? '-' }}</td>
                                            <td>{{ $template->country_code }}</td>
                                            <td class="text-end">
                                                <div class="btn-group">
                                                    <a href="{{ route('profile.my-templates.show', ['locale' => app()->getLocale(), 'userTemplate' => $template->id]) }}" class="btn btn-sm btn-outline-primary">{{ __('messages.use_button') }}</a>
                                                    <a href="{{ route('profile.my-templates.edit', ['locale' => app()->getLocale(), 'userTemplate' => $template->id]) }}" class="btn btn-sm btn-outline-secondary">{{ __('messages.edit_button') }}</a>
                                                    <form action="{{ route('profile.my-templates.destroy', ['locale' => app()->getLocale(), 'userTemplate' => $template->id]) }}" method="POST" onsubmit="return confirm('{{ __('messages.delete_confirm_message') }}');" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('messages.delete_button') }}</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">{{ $userTemplates->links() }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
