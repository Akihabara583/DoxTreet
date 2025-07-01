@extends('layouts.app')

@section('title', __('messages.edit_category') . ' - ' . config('app.name'))

@section('content')
    <div class="container">
        <h1>{{ __('messages.edit_category') }}: {{ $category->name }}</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.categories.update', ['locale' => app()->getLocale(), 'category' => $category->slug]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (уникальный идентификатор, только латиница и тире)</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required>
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>
                    <h5>{{ __('messages.translations') }}</h5>
                    <p class="text-muted small">Вам нужно вручную обновить переводы в файлах `lang/{locale}/categories.php`, связав их со слагом.</p>

                    @foreach(config('app.available_locales') as $locale)
                        <div class="mb-3">
                            <label for="name_{{ $locale }}" class="form-label">{{ __('messages.name') }} ({{ strtoupper($locale) }})</label>
                            {{-- Загружаем перевод из lang файла --}}
                            <input type="text" class="form-control @error('name_'.$locale) is-invalid @enderror" id="name_{{ $locale }}" name="name_{{ $locale }}" value="{{ old('name_'.$locale, trans('categories.'.$category->slug, [], $locale)) }}" required>
                            @error('name_'.$locale)
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach


                    <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
                    <a href="{{ route('admin.categories.index', app()->getLocale()) }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
@endsection
