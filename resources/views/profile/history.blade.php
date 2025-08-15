@extends('layouts.app')

@section('title', __('messages.document_history') . ' - ' . config('app.name'))

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
        .stat-card {
            background-color: var(--bg-secondary, #faf7ff);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid var(--border, #e5e1f5);
        }
        .stat-card .display-6 {
            font-weight: 700;
            color: var(--primary, #8b5cf6);
        }
        .btn-modern {
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
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

        /* ✅ ИСПРАВЛЕННЫЙ CSS ТОЛЬКО ДЛЯ ВЫПАДАЮЩЕГО СПИСКА */
        .navbar .dropdown-menu {
            border-radius: 16px !important;
            border: 1px solid var(--border, #e5e1f5) !important;
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
            padding: 0.5rem !important;
            margin-top: 0.75rem !important;
            background-color: var(--bg-primary, #ffffff) !important;
        }
        .navbar .dropdown-item {
            border-radius: 12px;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }
        .navbar .dropdown-item:hover, .navbar .dropdown-item:focus {
            background-color: var(--bg-secondary, #faf7ff);
            color: var(--primary, #8b5cf6);
        }
        .navbar .dropdown-item i {
            margin-right: 0.75rem;
        }
        /* ✅ КОНЕЦ ИСПРАВЛЕННОГО CSS */
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
        .btn-primary-modern-outline {
            background-color: transparent;
            border: 1px solid var(--primary, #8b5cf6);
            color: var(--primary, #8b5cf6);
        }
        .btn-primary-modern-outline:hover {
            background-color: var(--primary, #8b5cf6);
            color: white;
        }
        .btn-danger-modern {
            background-color: var(--danger, #ef4444);
            color: white;
        }
        .btn-danger-modern:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        .btn-danger-modern-outline {
            background-color: transparent;
            border: 1px solid var(--danger, #ef4444);
            color: var(--danger, #ef4444);
        }
        .btn-danger-modern-outline:hover {
            background-color: var(--danger, #ef4444);
            color: white;
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
                        <a href="{{ route('profile.show', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-person-circle"></i> {{ __('messages.overview') }}
                        </a>
                        <a href="{{ route('profile.edit', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-pencil-square"></i> {{ __('messages.edit_profile') }}
                        </a>
                        <a href="{{ route('profile.history', app()->getLocale()) }}" class="list-group-item list-group-item-action active" aria-current="true">
                            <i class="bi bi-clock-history"></i> {{ __('messages.document_history') }}
                        </a>
                        <a href="{{ route('profile.my-data', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-safe"></i> {{ __('messages.my_data') }}
                        </a>
                        <a href="{{ route('profile.subscription', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-gem"></i> {{ __('messages.my_subscription') }}
                        </a>
                        <a href="{{ route('profile.signed-documents.history', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-pen"></i> {{ __('messages.signed_documents') }}
                        </a>
                        <a href="{{ route('profile.my-templates.index', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-collection"></i> {{ __('messages.my_templates') }}
                        </a>
                        <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-plus-circle"></i> {{ __('messages.create_template') }}
                        </a>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="col-md-9">
                    <div class="profile-content">
                        <h2 class="h3 mb-2" style="color: var(--text-primary);">{{ __('messages.document_history') }}</h2>
                        <p class="text-muted mb-4">{{ __('messages.document_history_text') }}</p>

                        <div class="alert alert-info" role="alert" style="background-color: var(--bg-secondary); border-color: var(--border);">
                            <i class="bi bi-info-circle-fill"></i> {{ __('messages.history_limit_warning') }}
                        </div>

                        <form action="{{ route('profile.history.delete-selected', app()->getLocale()) }}" method="POST" id="delete-selected-form">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-hover align-middle table-modern">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%;"><input type="checkbox" class="form-check-input" id="select-all"></th>
                                        <th>{{ __('messages.template_name') }}</th>
                                        <th>{{ __('messages.creation_date') }}</th>
                                        <th>{{ __('messages.actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($documents as $document)
                                        <tr>
                                            <td><input type="checkbox" name="documents[]" value="{{ $document->id }}" class="form-check-input document-checkbox"></td>
                                            <td>
                                                @if ($document->template)
                                                    {{ $document->template->title }}
                                                @elseif ($document->userTemplate)
                                                    {{ $document->userTemplate->name }}
                                                    <span class="badge bg-secondary">{{ __('messages.user_template') }}</span>
                                                @else
                                                    <span class="text-muted">{{ __('messages.template_deleted') }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $document->created_at->format('d.m.Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('profile.history.reuse', ['locale' => app()->getLocale(), 'document' => $document->id]) }}" class="btn btn-sm btn-primary-modern-outline btn-modern">
                                                    <i class="bi bi-arrow-repeat"></i> {{ __('messages.reuse') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4">{{ __('messages.no_documents_yet') }}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            @if($documents->isNotEmpty())
                                <div class="mt-4 d-flex align-items-center">
                                    <button type="submit" class="btn btn-danger-modern btn-modern">{{ __('messages.delete_selected') }}</button>
                                    <button type="button" class="btn btn-danger-modern-outline btn-modern ms-2" id="delete-all-btn">{{ __('messages.delete_all') }}</button>
                                    <div class="ms-auto text-muted small">
                                        {{ __('messages.documents_stored', ['count' => $documents->total()]) }}
                                    </div>
                                </div>
                            @endif
                        </form>

                        <form action="{{ route('profile.history.delete-all', app()->getLocale()) }}" method="POST" id="delete-all-form" class="d-none">@csrf</form>

                        <div class="mt-4">{{ $documents->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectAllCheckbox = document.getElementById('select-all');
            const documentCheckboxes = document.querySelectorAll('.document-checkbox');
            const deleteSelectedForm = document.getElementById('delete-selected-form');
            const deleteAllBtn = document.getElementById('delete-all-btn');
            const deleteAllForm = document.getElementById('delete-all-form');

            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function () {
                    documentCheckboxes.forEach(checkbox => {
                        checkbox.checked = this.checked;
                    });
                });
            }

            if (deleteSelectedForm) {
                deleteSelectedForm.addEventListener('submit', function (e) {
                    const checkedCount = document.querySelectorAll('.document-checkbox:checked').length;
                    if (checkedCount === 0) {
                        e.preventDefault();
                        alert("{{ __('messages.alert_no_documents_selected') }}");
                        return;
                    }
                    const confirmationMessage = "{{ __('messages.confirm_delete_selected') }}".replace(':count', checkedCount);
                    if (!confirm(confirmationMessage)) {
                        e.preventDefault();
                    }
                });
            }

            if (deleteAllBtn) {
                deleteAllBtn.addEventListener('click', function(e) {
                    if (confirm("{{ __('messages.confirm_delete_all') }}")) {
                        deleteAllForm.submit();
                    }
                });
            }
        });
    </script>
@endpush
