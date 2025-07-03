@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Доступные документы</h1>

        @forelse ($countries as $country)
            <div class="mb-10">
                <h2 class="text-2xl font-semibold mb-4 border-b pb-2">
                    <span class="fi fi-{{ strtolower($country['code']) }} mr-3"></span> {{-- Иконка флага, если у вас есть CSS-флаги --}}
                    {{ $country['name'] }}
                </h2>

                @if(empty($country['documents']))
                    <p class="text-gray-500">Для этой страны пока нет доступных шаблонов.</p>
                @else
                    <ul class="list-disc list-inside">
                        @foreach ($country['documents'] as $document)
                            <li class="mb-2">
                                <a href="{{ route('documents.show', ['locale' => $currentLocale, 'countryCode' => $country['code'], 'templateSlug' => $document->slug]) }}">
                                    {{ $document->title }} {{-- Теперь title берется из перевода, который мы подгрузили --}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @empty
            <p class="text-center text-gray-600 text-xl">На данный момент нет доступных документов.</p>
        @endforelse
    </div>
@endsection
