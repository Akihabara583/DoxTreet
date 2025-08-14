@extends('layouts.app')

@section('title', __('messages.my_data') . ' - ' . config('app.name'))

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
        .modern-form-label {
            font-weight: 600;
            color: var(--text-secondary, #4c495d);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        .modern-form-control {
            display: block;
            width: 100%;
            background-color: var(--bg-secondary, #faf7ff) !important;
            border: 1px solid var(--border, #e5e1f5) !important;
            border-radius: 12px !important;
            padding: 0.75rem 1rem !important;
            color: var(--text-primary, #1e1b31) !important;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .modern-form-control:focus {
            outline: none !important;
            border-color: var(--primary, #8b5cf6) !important;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2) !important;
            background-color: var(--bg-primary, #fff) !important;
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
                        <a href="{{ route('profile.history', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-clock-history"></i> {{ __('messages.document_history') }}
                        </a>
                        <a href="{{ route('profile.my-data', app()->getLocale()) }}" class="list-group-item list-group-item-action active" aria-current="true">
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
                        <h2 class="h3 mb-2" style="color: var(--text-primary);">{{ __('messages.my_data') }}</h2>
                        <p class="text-muted mb-4">{{ __('messages.my_data_text') }}</p>

                        <form method="post" action="{{ route('profile.my-data.update', ['locale' => app()->getLocale()]) }}">
                            @csrf
                            @method('patch')

                            @if (session('status') === 'details-updated')
                                <div class="alert alert-success" role="alert">{{ __('messages.my_data_updated_successfully') }}</div>
                            @endif

                            <h5 class="mt-4" style="color: var(--text-primary);">{{ __('messages.section_personal_data') }}</h5><hr class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-3"><label for="full_name_nominative" class="form-label modern-form-label">{{ __('messages.full_name_nominative') }}</label><input type="text" class="form-control modern-form-control" id="full_name_nominative" name="full_name_nominative" value="{{ old('full_name_nominative', $details->full_name_nominative) }}"></div>
                                <div class="col-md-6 mb-3"><label for="full_name_genitive" class="form-label modern-form-label">{{ __('messages.full_name_genitive') }}</label><input type="text" class="form-control modern-form-control" id="full_name_genitive" name="full_name_genitive" value="{{ old('full_name_genitive', $details->full_name_genitive) }}"></div>
                                <div class="col-md-6 mb-3"><label for="tax_id_number" class="form-label modern-form-label">{{ __('messages.tax_id_number') }}</label><input type="text" class="form-control modern-form-control" id="tax_id_number" name="tax_id_number" value="{{ old('tax_id_number', $details->tax_id_number) }}"></div>
                                <div class="col-md-6 mb-3"><label for="phone_number" class="form-label modern-form-label">{{ __('messages.phone_number') }}</label><input type="text" class="form-control modern-form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $details->phone_number) }}"></div>
                                <div class="col-12 mb-3"><label for="address_registered" class="form-label modern-form-label">{{ __('messages.address_registered') }}</label><textarea class="form-control modern-form-control" id="address_registered" name="address_registered" rows="2">{{ old('address_registered', $details->address_registered) }}</textarea></div>
                                <div class="col-12 mb-3"><label for="address_factual" class="form-label modern-form-label">{{ __('messages.address_factual') }}</label><textarea class="form-control modern-form-control" id="address_factual" name="address_factual" rows="2">{{ old('address_factual', $details->address_factual) }}</textarea></div>
                            </div>

                            <h5 class="mt-4" style="color: var(--text-primary);">{{ __('messages.section_passport_data') }}</h5><hr class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-3"><label for="passport_series" class="form-label modern-form-label">{{ __('messages.passport_series') }}</label><input type="text" class="form-control modern-form-control" id="passport_series" name="passport_series" value="{{ old('passport_series', $details->passport_series) }}"></div>
                                <div class="col-md-6 mb-3"><label for="passport_number" class="form-label modern-form-label">{{ __('messages.passport_number') }}</label><input type="text" class="form-control modern-form-control" id="passport_number" name="passport_number" value="{{ old('passport_number', $details->passport_number) }}"></div>
                                <div class="col-md-6 mb-3"><label for="passport_issuer" class="form-label modern-form-label">{{ __('messages.passport_issuer') }}</label><input type="text" class="form-control modern-form-control" id="passport_issuer" name="passport_issuer" value="{{ old('passport_issuer', $details->passport_issuer) }}"></div>
                                <div class="col-md-6 mb-3"><label for="passport_date" class="form-label modern-form-label">{{ __('messages.passport_date') }}</label><input type="date" class="form-control modern-form-control" id="passport_date" name="passport_date" value="{{ old('passport_date', optional($details->passport_date)->format('Y-m-d')) }}"></div>
                                <div class="col-12 mb-3"><label for="id_card_number" class="form-label modern-form-label">{{ __('messages.id_card_number') }}</label><input type="text" class="form-control modern-form-control" id="id_card_number" name="id_card_number" value="{{ old('id_card_number', $details->id_card_number) }}"></div>
                            </div>

                            <h5 class="mt-4" style="color: var(--text-primary);">{{ __('messages.section_company_data') }}</h5><hr class="mb-4">
                            <div class="row">
                                <div class="col-12 mb-3"><label for="legal_entity_name" class="form-label modern-form-label">{{ __('messages.legal_entity_name') }}</label><input type="text" class="form-control modern-form-control" id="legal_entity_name" name="legal_entity_name" value="{{ old('legal_entity_name', $details->legal_entity_name) }}"></div>
                                <div class="col-12 mb-3"><label for="legal_entity_address" class="form-label modern-form-label">{{ __('messages.legal_entity_address') }}</label><input type="text" class="form-control modern-form-control" id="legal_entity_address" name="legal_entity_address" value="{{ old('legal_entity_address', $details->legal_entity_address) }}"></div>
                                <div class="col-md-6 mb-3"><label for="legal_entity_tax_id" class="form-label modern-form-label">{{ __('messages.legal_entity_tax_id') }}</label><input type="text" class="form-control modern-form-control" id="legal_entity_tax_id" name="legal_entity_tax_id" value="{{ old('legal_entity_tax_id', $details->legal_entity_tax_id) }}"></div>
                                <div class="col-md-6 mb-3"><label for="position" class="form-label modern-form-label">{{ __('messages.position') }}</label><input type="text" class="form-control modern-form-control" id="position" name="position" value="{{ old('position', $details->position) }}"></div>
                                <div class="col-12 mb-3"><label for="represented_by" class="form-label modern-form-label">{{ __('messages.represented_by') }}</label><input type="text" class="form-control modern-form-control" id="represented_by" name="represented_by" value="{{ old('represented_by', $details->represented_by) }}" placeholder="{{ __('messages.represented_by_placeholder') }}"></div>
                            </div>

                            <h5 class="mt-4" style="color: var(--text-primary);">{{ __('messages.section_bank_details') }}</h5><hr class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-3"><label for="bank_name" class="form-label modern-form-label">{{ __('messages.bank_name') }}</label><input type="text" class="form-control modern-form-control" id="bank_name" name="bank_name" value="{{ old('bank_name', $details->bank_name) }}"></div>
                                <div class="col-md-6 mb-3"><label for="bank_iban" class="form-label modern-form-label">{{ __('messages.bank_iban') }}</label><input type="text" class="form-control modern-form-control" id="bank_iban" name="bank_iban" value="{{ old('bank_iban', $details->bank_iban) }}"></div>
                            </div>

                            <h5 class="mt-4" style="color: var(--text-primary);">{{ __('messages.section_contact_info') }}</h5><hr class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-3"><label for="contact_email" class="form-label modern-form-label">{{ __('messages.contact_email') }}</label><input type="email" class="form-control modern-form-control" id="contact_email" name="contact_email" value="{{ old('contact_email', $details->contact_email) }}"></div>
                                <div class="col-md-6 mb-3"><label for="website" class="form-label modern-form-label">{{ __('messages.website') }}</label><input type="url" class="form-control modern-form-control" id="website" name="website" value="{{ old('website', $details->website) }}" placeholder="https://example.com"></div>
                            </div>

                            <button type="submit" class="btn btn-primary-modern btn-modern mt-4 w-100">{{ __('messages.save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
