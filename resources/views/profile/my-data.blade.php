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
                    {{-- Активный пункт меню --}}
                    <a href="{{ route('profile.my-data', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action active" aria-current="true">
                        <i class="bi bi-safe"></i> {{ __('messages.my_data') }}
                    </a>
                    <a href="{{ route('pricing', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-gem"></i> {{ __('messages.my_subscription') }}
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

                            {{-- ОБЩИЕ ДАННЫЕ --}}
                            <h5 class="mt-4">{{ __('messages.section_general_data') }}</h5>
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

                            <button type="submit" class="btn btn-primary mt-3">{{ __('messages.save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
