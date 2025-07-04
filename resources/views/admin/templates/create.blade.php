@extends('layouts.app')

@section('title', __('messages.add_template') . ' - ' . config('app.name'))

@section('content')
    <div class="container">
        <h1>{{ __('messages.add_template') }}</h1>

        <form action="{{ route('admin.templates.store', app()->getLocale()) }}" method="POST" id="template-form">
            @csrf
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="localeTabs" role="tablist">
                        @foreach($locales as $locale)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{$locale}}-tab" data-bs-toggle="tab" data-bs-target="#{{$locale}}-tab-pane" type="button" role="tab">{{ strtoupper($locale) }}</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-body">
                    {{-- НЕПЕРЕВОДИМЫЕ ПОЛЯ --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
                            @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category_id" class="form-label">{{ __('messages.category') }}</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="is_active" class="form-label">{{ __('messages.status') }}</label>
                            <select class="form-select" id="is_active" name="is_active">
                                <option value="1" selected>{{ __('messages.active') }}</option>
                                <option value="0">{{ __('messages.inactive') }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="country_code" class="form-label">Код страны</label>
                            <select class="form-select @error('country_code') is-invalid @enderror" id="country_code" name="country_code">
                                <option value="">Глобальный шаблон</option>
                                @foreach($countries as $code => $name)
                                    <option value="{{ $code }}" {{ old('country_code') == $code ? 'selected' : '' }}>
                                        {{ $name }} ({{ $code }})
                                    </option>
                                @endforeach
                            </select>
                            @error('country_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- ОБЩЕЕ ПОЛЕ JSON --}}
                    <div class="mb-3">
                        <label for="fields" class="form-label">Поля формы (JSON) - Общие для всех языков</label>
                        <textarea class="form-control @error('fields') is-invalid @enderror" id="fields" name="fields" rows="10" required>{{ old('fields', "[\n    {\n        \"name\": \"full_name\",\n        \"type\": \"text\",\n        \"required\": true\n    }\n]") }}</textarea>
                        @error('fields') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <hr>

                    {{-- ПЕРЕВОДИМЫЕ ПОЛЯ --}}
                    <div class="tab-content" id="localeTabsContent">
                        @foreach($locales as $locale)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{$locale}}-tab-pane" role="tabpanel">
                                {{-- Title --}}
                                <div class="my-3">
                                    <label class="form-label">{{ __('messages.title') }}</label>
                                    <input type="text" class="form-control" name="translations[{{$locale}}][title]" value="{{ old('translations.'.$locale.'.title') }}">
                                </div>
                                {{-- Description --}}
                                <div class="mb-3">
                                    <label class="form-label">{{ __('messages.description') }}</label>
                                    <textarea class="form-control" name="translations[{{$locale}}][description]" rows="3">{{ old('translations.'.$locale.'.description') }}</textarea>
                                </div>
                                {{-- HTML Fields --}}
                                <hr>
                                <div class="mb-3">
                                    <label class="form-label">Шапка документа (HTML)</label>
                                    <textarea class="form-control" name="translations[{{$locale}}][header_html]" rows="5">{{ old('translations.'.$locale.'.header_html') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Тело документа (HTML)</label>
                                    <textarea class="form-control" name="translations[{{$locale}}][body_html]" rows="10">{{ old('translations.'.$locale.'.body_html') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Подвал документа (HTML)</label>
                                    <textarea class="form-control" name="translations[{{$locale}}][footer_html]" rows="5">{{ old('translations.'.$locale.'.footer_html') }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">{{ __('messages.save') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
