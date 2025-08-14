@extends('layouts.app')

@section('title', 'Создать новый пакет документов')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('admin.partials._sidebar')
            </div>
            <div class="col-md-9">
                <h1>Создать пакет документов</h1>

                <form action="{{ route('admin.bundles.store') }}" method="POST">
                    @csrf

                    <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                        @foreach($locales as $locale)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link @if($loop->first) active @endif" id="tab-{{ $locale }}" data-bs-toggle="tab" data-bs-target="#content-{{ $locale }}" type="button" role="tab">{{ strtoupper($locale) }}</button>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content pt-3" id="languageTabContent">
                        @foreach($locales as $locale)
                            <div class="tab-pane fade @if($loop->first) show active @endif" id="content-{{ $locale }}" role="tabpanel">
                                <div class="mb-3">
                                    <label for="title-{{ $locale }}" class="form-label">Название пакета ({{ strtoupper($locale) }})</label>
                                    <input type="text" class="form-control" id="title-{{ $locale }}" name="title[{{ $locale }}]" value="{{ old('title.'.$locale) }}" @if($locale == 'en') required @endif>
                                </div>
                                <div class="mb-3">
                                    <label for="description-{{ $locale }}" class="form-label">Описание ({{ strtoupper($locale) }})</label>
                                    <textarea class="form-control" id="description-{{ $locale }}" name="description[{{ $locale }}]" rows="3">{{ old('description.'.$locale) }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="mb-3">
                        <label for="country_code" class="form-label">Страна</label>
                        <select class="form-select" id="country_code" name="country_code" required>
                            <option value="">-- Выберите страну --</option>
                            <option value="PL" @if(old('country_code') == 'PL') selected @endif>Польша</option>
                            <option value="UA" @if(old('country_code') == 'UA') selected @endif>Украина</option>
                            <option value="DE" @if(old('country_code') == 'DE') selected @endif>Германия</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="access_level" class="form-label">Уровень доступа</label>
                        <select class="form-select" id="access_level" name="access_level" required>
                            <option value="pro" @if(old('access_level', $bundle->access_level ?? 'pro') == 'pro') selected @endif>Только для PRO</option>
                            <option value="standard" @if(old('access_level', $bundle->access_level ?? '') == 'standard') selected @endif>Для Standard и PRO</option>
                            <option value="all" @if(old('access_level', $bundle->access_level ?? '') == 'all') selected @endif>Для всех пользователей</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Шаблоны в пакете</label>
                        <p class="small text-muted">Выберите шаблоны и перетащите их, чтобы задать порядок шагов.</p>
                        <div id="templates-container">
                            {{-- Сюда будут добавляться выбранные шаблоны --}}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Доступные для добавления шаблоны</label>
                        <select id="template-selector" class="form-select">
                            <option value="">-- Выберите шаблон --</option>
                            {{-- Опции будут отфильтрованы JS --}}
                            @foreach($templatesByCountry->sortKeys() as $country => $templates)
                                <optgroup label="{{ $country }}">
                                    @foreach($templates->sortBy('title') as $template)
                                        <option value="{{ $template->id }}" data-country="{{ $template->country_code }}">{{ $template->title }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить пакет</button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        @include('admin.bundles.partials._sortable_script')
    @endpush
@endsection
