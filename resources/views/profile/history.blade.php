@extends('layouts.app')

@section('title', __('messages.document_history') . ' - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        <div class="row">
            {{-- Боковое меню (без изменений) --}}
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('profile.show', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.show') ? 'active' : '' }}">
                        <i class="bi bi-person-circle"></i> {{ __('messages.overview') }}
                    </a>
                    <a href="{{ route('profile.edit', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <i class="bi bi-pencil-square"></i> {{ __('messages.edit_profile') }}
                    </a>
                    <a href="{{ route('profile.history', app()->getLocale()) }}" class="list-group-item list-group-item-action active">
                        <i class="bi bi-clock-history"></i> {{ __('messages.document_history') }}
                    </a>
                    <a href="{{ route('profile.my-data', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-data') ? 'active' : '' }}">
                        <i class="bi bi-safe"></i> {{ __('messages.my_data') }}
                    </a>
                    {{-- ✅ ИСПРАВЛЕННЫЙ МАРШРУТ --}}
                    <a href="{{ route('profile.subscription', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-gem"></i> {{ __('messages.my_subscription') }}
                    </a>
                    <a href="{{ route('profile.signed-documents.history', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.signed-documents.history') ? 'active' : '' }}">
                        <i class="bi bi-pen"></i> {{ __('messages.signed_documents') }}
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
            <div class="col-md-9" id="js-translation-strings"
                 data-alert-no-documents-selected="{{ __('messages.alert_no_documents_selected') }}"
                 data-confirm-delete-selected="{{ __('messages.confirm_delete_selected') }}"
                 data-confirm-delete-all="{{ __('messages.confirm_delete_all_history') }}">
                <h2>{{ __('messages.document_history') }}</h2>
                <p class="text-muted">{{ __('messages.document_history_text') }}</p>

                {{-- Дисклеймер о лимите --}}
                <div class="alert alert-info" role="alert">
                    <i class="bi bi-info-circle-fill"></i> {{ __('messages.history_limit_warning') }}
                </div>

                <form action="{{ route('profile.history.delete-selected', app()->getLocale()) }}" method="POST" id="delete-selected-form">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%;"><input type="checkbox" id="select-all"></th>
                                        <th>{{ __('messages.template_name') }}</th>
                                        <th>{{ __('messages.creation_date') }}</th>
                                        <th>{{ __('messages.actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($documents as $document)
                                        <tr>
                                            <td><input type="checkbox" name="documents[]" value="{{ $document->id }}" class="document-checkbox"></td>
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
                                                <a href="{{ route('profile.history.reuse', ['locale' => app()->getLocale(), 'document' => $document->id]) }}" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-arrow-repeat"></i> {{ __('messages.reuse') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">{{ __('messages.no_documents_yet') }}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @if($documents->isNotEmpty())
                        <div class="mt-4 d-flex align-items-center">
                            <button type="submit" class="btn btn-danger">{{ __('messages.delete_selected') }}</button>
                            <button type="button" class="btn btn-outline-danger ms-2" id="delete-all-btn">{{ __('messages.delete_all') }}</button>
                            <div class="ms-auto text-muted">
                                {{ __('messages.documents_stored', ['count' => $documents->total()]) }}
                            </div>
                        </div>
                    @endif
                </form>

                <form action="{{ route('profile.history.delete-all', app()->getLocale()) }}" method="POST" id="delete-all-form" class="d-none">
                    @csrf
                </form>

                <div class="mt-4">
                    {{ $documents->links() }}
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
            const translationContainer = document.getElementById('js-translation-strings');

            const alertNoDocumentsSelected = translationContainer.dataset.alertNoDocumentsSelected;
            const confirmDeleteSelected = translationContainer.dataset.confirmDeleteSelected;
            const confirmDeleteAll = translationContainer.dataset.confirmDeleteAll;

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
                        alert(alertNoDocumentsSelected);
                        return;
                    }
                    const confirmationMessage = confirmDeleteSelected.replace(':count', checkedCount);
                    if (!confirm(confirmationMessage)) {
                        e.preventDefault();
                    }
                });
            }

            if (deleteAllBtn) {
                deleteAllBtn.addEventListener('click', function(e) {
                    if (confirm(confirmDeleteAll)) {
                        deleteAllForm.submit();
                    }
                });
            }
        });
    </script>
@endpush
