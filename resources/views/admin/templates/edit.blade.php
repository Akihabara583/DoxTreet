@extends('layouts.app')

@section('title', __('messages.edit_template') . ' - ' . config('app.name'))

@section('content')
    <div class="container">
        <h1>{{ __('messages.edit_template') }}</h1>

        <form action="{{ route('admin.templates.update', ['locale' => app()->getLocale(), 'template' => $template->id]) }}" method="POST" id="template-form">
            @csrf
            @method('PUT')
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
                    <div class="tab-content" id="localeTabsContent">
                        @foreach($locales as $locale)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{$locale}}-tab-pane" role="tabpanel">
                                <div class="my-3">
                                    <label for="translations_{{$locale}}_title" class="form-label">{{ __('messages.title') }}</label>
                                    <input type="text" class="form-control @error('translations.'.$locale.'.title') is-invalid @enderror" name="translations[{{$locale}}][title]" value="{{ old('translations.'.$locale.'.title', $translations[$locale]->title ?? '') }}">
                                    @error('translations.'.$locale.'.title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="translations_{{$locale}}_description" class="form-label">{{ __('messages.description') }}</label>
                                    <textarea class="form-control @error('translations.'.$locale.'.description') is-invalid @enderror" name="translations[{{$locale}}][description]" rows="3">{{ old('translations.'.$locale.'.description', $translations[$locale]->description ?? '') }}</textarea>
                                    @error('translations.'.$locale.'.description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $template->slug) }}" required>
                            @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category_id" class="form-label">{{ __('messages.category') }}</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $template->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="is_active" class="form-label">{{ __('messages.status') }}</label>
                            <select class="form-select" id="is_active" name="is_active">
                                <option value="1" {{ old('is_active', $template->is_active) == 1 ? 'selected' : '' }}>{{ __('messages.active') }}</option>
                                <option value="0" {{ old('is_active', $template->is_active) == 0 ? 'selected' : '' }}>{{ __('messages.inactive') }}</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="country_code" class="form-label">Код страны</label>
                            <select class="form-select @error('country_code') is-invalid @enderror" id="country_code" name="country_code">
                                <option value="">Глобальный шаблон</option>
                                @foreach($countries as $code => $name)
                                    {{-- Для edit.blade.php --}}
                                    <option value="{{ $code }}" {{ old('country_code', $template->country_code ?? '') == $code ? 'selected' : '' }}>
                                        {{ $name }} ({{ $code }})
                                    </option>
                                @endforeach
                            </select>
                            @error('country_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- ВСТАВЬТЕ ЭТОТ БЛОК ПЕРЕД ПОЛЕМ "Поля формы (JSON)" --}}
                    <hr>
                    <div class="alert alert-info small">
                        <b>Подсказка:</b> В полях ниже вы можете использовать HTML-теги для оформления и переменные в формате <code>[[field_name]]</code>.
                        Например: <code>[[full_name]]</code>.
                    </div>

                    <div class="mb-3">
                        <label for="header_html" class="form-label">Шапка документа (HTML)</label>
                        {{-- old('header_html', $template->header_html) - подставляет старое значение при ошибке валидации, иначе - значение из базы --}}
                        <textarea class="form-control" id="header_html" name="header_html" rows="5">{{ old('header_html', $template->header_html) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="body_html" class="form-label">Тело документа (HTML)</label>
                        <textarea class="form-control" id="body_html" name="body_html" rows="15">{{ old('body_html', $template->body_html) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="footer_html" class="form-label">Подвал документа (HTML)</label>
                        <textarea class="form-control" id="footer_html" name="footer_html" rows="5">{{ old('footer_html', $template->footer_html) }}</textarea>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="fields" class="form-label">Поля формы (JSON)</label>
                        <textarea class="form-control @error('fields') is-invalid @enderror" id="fields" name="fields" rows="15" required>{{ old('fields', json_encode($template->fields, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) }}</textarea>
                        @error('fields') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('template-form').addEventListener('submit', function(e) {
            var fieldsTextarea = document.getElementById('fields');
            try {
                JSON.parse(fieldsTextarea.value);
                fieldsTextarea.classList.remove('is-invalid');
            } catch (error) {
                e.preventDefault();
                fieldsTextarea.classList.add('is-invalid');
                alert('Ошибка: JSON в поле "Поля формы" имеет неверный синтаксис!');
            }
        });
    </script>
@endpush
