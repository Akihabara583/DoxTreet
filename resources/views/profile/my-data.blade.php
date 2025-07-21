@extends('layouts.app')

@section('title', __('messages.my_data') . ' - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        <div class="row">
            {{-- Боковое меню --}}
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('profile.show', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-person-circle"></i> {{ __('messages.overview') }}
                    </a>
                    <a href="{{ route('profile.edit', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-pencil-square"></i> {{ __('messages.edit_profile') }}
                    </a>
                    <a href="{{ route('profile.history', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-clock-history"></i> {{ __('messages.document_history') }}
                    </a>
                    <a href="{{ route('profile.my-data', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action active" aria-current="true">
                        <i class="bi bi-safe"></i> {{ __('messages.my_data') }}
                    </a>
                    <a href="{{ route('pricing', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-gem"></i> {{ __('messages.my_subscription') }}
                    </a>
                    <a href="{{ route('profile.signed-documents.history', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.signed-documents.history') ? 'active' : '' }}">
                        <i class="bi bi-pen"></i> {{ __('messages.signed_documents') }}
                    </a>
                    <a href="{{ route('profile.my-templates.index', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.*') && !request()->routeIs('profile.my-templates.create') ? 'active' : '' }}">
                        <i class="bi bi-collection me-2"></i> {{ __('messages.my_templates') }}
                    </a>
                    <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.create') ? 'active' : '' }}">
                        <i class="bi bi-plus-circle me-2"></i> {{ __('messages.create_template') }}
                    </a>
                </div>
            </div>

            {{-- Форма с данными --}}
            <div class="col-md-9">
                <h2>{{ __('messages.my_data') }}</h2>
                <p class="text-muted">{{ __('messages.my_data_text') }}</p>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.my-data.update', ['locale' => app()->getLocale()]) }}">
                            @csrf
                            @method('patch')

                            @if (session('status') === 'details-updated')
                                <div class="alert alert-success" role="alert">
                                    {{ __('messages.my_data_updated_successfully') }}
                                </div>
                            @endif

                            {{-- ЛИЧНЫЕ ДАННЫЕ --}}
                            <h5 class="mt-4">{{ __('messages.section_personal_data') }}</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="full_name_nominative" class="form-label">{{ __('messages.full_name_nominative') }}</label>
                                    <input type="text" class="form-control" id="full_name_nominative" name="full_name_nominative" value="{{ old('full_name_nominative', $details->full_name_nominative) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="full_name_genitive" class="form-label">{{ __('messages.full_name_genitive') }}</label>
                                    <input type="text" class="form-control" id="full_name_genitive" name="full_name_genitive" value="{{ old('full_name_genitive', $details->full_name_genitive) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tax_id_number" class="form-label">{{ __('messages.tax_id_number') }}</label>
                                    <input type="text" class="form-control" id="tax_id_number" name="tax_id_number" value="{{ old('tax_id_number', $details->tax_id_number) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone_number" class="form-label">{{ __('messages.phone_number') }}</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $details->phone_number) }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address_registered" class="form-label">{{ __('messages.address_registered') }}</label>
                                <textarea class="form-control" id="address_registered" name="address_registered" rows="2">{{ old('address_registered', $details->address_registered) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="address_factual" class="form-label">{{ __('messages.address_factual') }}</label>
                                <textarea class="form-control" id="address_factual" name="address_factual" rows="2">{{ old('address_factual', $details->address_factual) }}</textarea>
                            </div>

                            {{-- ПАСПОРТНЫЕ ДАННЫЕ --}}
                            <h5 class="mt-4">{{ __('messages.section_passport_data') }}</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="passport_series" class="form-label">{{ __('messages.passport_series') }}</label>
                                    <input type="text" class="form-control" id="passport_series" name="passport_series" value="{{ old('passport_series', $details->passport_series) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="passport_number" class="form-label">{{ __('messages.passport_number') }}</label>
                                    <input type="text" class="form-control" id="passport_number" name="passport_number" value="{{ old('passport_number', $details->passport_number) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="passport_issuer" class="form-label">{{ __('messages.passport_issuer') }}</label>
                                    <input type="text" class="form-control" id="passport_issuer" name="passport_issuer" value="{{ old('passport_issuer', $details->passport_issuer) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="passport_date" class="form-label">{{ __('messages.passport_date') }}</label>
                                    <input type="date" class="form-control" id="passport_date" name="passport_date" value="{{ old('passport_date', optional($details->passport_date)->format('Y-m-d')) }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="id_card_number" class="form-label">{{ __('messages.id_card_number') }}</label>
                                <input type="text" class="form-control" id="id_card_number" name="id_card_number" value="{{ old('id_card_number', $details->id_card_number) }}">
                            </div>

                            {{-- ДАННЫЕ КОМПАНИИ / ФОП --}}
                            <h5 class="mt-4">{{ __('messages.section_company_data') }}</h5>
                            <hr>
                            <div class="mb-3">
                                <label for="legal_entity_name" class="form-label">{{ __('messages.legal_entity_name') }}</label>
                                <input type="text" class="form-control" id="legal_entity_name" name="legal_entity_name" value="{{ old('legal_entity_name', $details->legal_entity_name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="legal_entity_address" class="form-label">{{ __('messages.legal_entity_address') }}</label>
                                <input type="text" class="form-control" id="legal_entity_address" name="legal_entity_address" value="{{ old('legal_entity_address', $details->legal_entity_address) }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="legal_entity_tax_id" class="form-label">{{ __('messages.legal_entity_tax_id') }}</label>
                                    <input type="text" class="form-control" id="legal_entity_tax_id" name="legal_entity_tax_id" value="{{ old('legal_entity_tax_id', $details->legal_entity_tax_id) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="position" class="form-label">{{ __('messages.position') }}</label>
                                    <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $details->position) }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="represented_by" class="form-label">{{ __('messages.represented_by') }}</label>
                                <input type="text" class="form-control" id="represented_by" name="represented_by" value="{{ old('represented_by', $details->represented_by) }}" placeholder="{{ __('messages.represented_by_placeholder') }}">
                            </div>

                            {{-- БАНКОВСКИЕ РЕКВИЗИТЫ --}}
                            <h5 class="mt-4">{{ __('messages.section_bank_details') }}</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="bank_name" class="form-label">{{ __('messages.bank_name') }}</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ old('bank_name', $details->bank_name) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="bank_iban" class="form-label">{{ __('messages.bank_iban') }}</label>
                                    <input type="text" class="form-control" id="bank_iban" name="bank_iban" value="{{ old('bank_iban', $details->bank_iban) }}">
                                </div>
                            </div>

                            {{-- КОНТАКТНАЯ ИНФОРМАЦИЯ --}}
                            <h5 class="mt-4">{{ __('messages.section_contact_info') }}</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="contact_email" class="form-label">{{ __('messages.contact_email') }}</label>
                                    <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ old('contact_email', $details->contact_email) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="website" class="form-label">{{ __('messages.website') }}</label>
                                    <input type="url" class="form-control" id="website" name="website" value="{{ old('website', $details->website) }}" placeholder="https://example.com">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 w-100">{{ __('messages.save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
