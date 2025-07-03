{{-- resources/views/documents/generate.blade.php --}}
@extends('layouts.app') {{-- Используем ваш основной шаблон --}}

@section('content')
    <div class="container mx-auto py-8">
        {{-- Получаем название документа из локализации или используем базовое --}}
        @php
            $documentTitle = $template['localization'][$currentLocale]['document_title']
                             ?? $template['template_info']['name']
                             ?? 'Document Generator';
        @endphp

        <h1 class="text-3xl font-bold mb-6">{{ $documentTitle }}</h1>

        <form action="{{ route('documents.generate', ['locale' => $currentLocale, 'countryCode' => $countryCode, 'templateSlug' => $templateSlug]) }}" method="POST">
            @csrf

            {{-- Проходим по всем элементам структуры из JSON --}}
            @foreach($template['structure'] as $field)
                @php
                    // Получаем переведенное название поля для текущего языка
                    $label = $template['localization'][$currentLocale][$field['id']] ?? $field['id'];
                    $isRequired = $field['required'] ?? false;
                @endphp

                {{-- В зависимости от типа поля, рендерим разный HTML --}}
                @switch($field['type'])
                    @case('section')
                        <h2 class="text-2xl font-semibold mt-8 mb-4 border-b pb-2">{{ $label }}</h2>
                        @break

                    @case('text')
                    @case('email')
                    @case('tel')
                        <div class="mb-4">
                            <label for="{{ $field['id'] }}" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ $label }} @if($isRequired)<span class="text-red-500">*</span>@endif
                            </label>
                            <input type="{{ $field['type'] }}"
                                   id="{{ $field['id'] }}"
                                   name="{{ $field['id'] }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   @if($isRequired) required @endif>
                        </div>
                        @break

                    @case('textarea')
                        <div class="mb-4">
                            <label for="{{ $field['id'] }}" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ $label }} @if($isRequired)<span class="text-red-500">*</span>@endif
                            </label>
                            <textarea id="{{ $field['id'] }}"
                                      name="{{ $field['id'] }}"
                                      rows="4"
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                      @if($isRequired) required @endif></textarea>
                        </div>
                        @break

                    @case('static_text')
                        <p class="mt-6 text-sm text-gray-600 bg-gray-100 p-4 rounded">
                            {{ $label }}
                        </p>
                        @break

                    @case('image')
                        <div class="mb-4">
                            <label for="{{ $field['id'] }}" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ $label }}
                            </label>
                            <input type="file"
                                   id="{{ $field['id'] }}"
                                   name="{{ $field['id'] }}"
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
                                   accept="image/*">
                        </div>
                        @break

                @endswitch
            @endforeach

            <div class="mt-8">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Сгенерировать документ
                </button>
            </div>
        </form>
    </div>
@endsection
