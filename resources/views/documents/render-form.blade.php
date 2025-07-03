@extends('layouts.app')

@section('title', $templateModel->title . ' - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-light py-3">
                        <h1 class="h4 mb-0">{{ $templateModel->title }}</h1>
                    </div>
                    <div class="card-body p-4">
                        @if($templateModel->description)
                            <p class="text-muted mb-4">{{ $templateModel->description }}</p>
                        @endif

                        <form action="{{ route('documents.generate', ['locale' => $currentLocale, 'countryCode' => $templateModel->country_code, 'templateSlug' => $templateModel->slug]) }}" method="POST">
                            @csrf

                            @php
                                // Laravel уже преобразовал JSON в массив, поэтому json_decode не нужен.
                                $fields = $templateModel->fields;
                            @endphp

                            @if(is_array($fields))
                                @foreach($fields as $field)
                                    @php
                                        $label = $field['labels'][$currentLocale] ?? $field['name'];
                                        $isRequired = $field['required'] ?? false;
                                        $fieldName = $field['name'];
                                    @endphp

                                    <div class="mb-3">
                                        <label for="{{ $fieldName }}" class="form-label">
                                            {{ $label }}
                                            @if($isRequired)
                                                <span class="text-danger">*</span>
                                            @endif
                                        </label>

                                        @if($field['type'] === 'textarea')
                                            <textarea id="{{ $fieldName }}"
                                                      name="{{ $fieldName }}"
                                                      rows="4"
                                                      class="form-control @error($fieldName) is-invalid @enderror"
                                                      @if($isRequired) required @endif>{{ old($fieldName) }}</textarea>
                                        @else
                                            <input type="{{ $field['type'] }}"
                                                   id="{{ $fieldName }}"
                                                   name="{{ $fieldName }}"
                                                   class="form-control @error($fieldName) is-invalid @enderror"
                                                   value="{{ old($fieldName) }}"
                                                   @if($isRequired) required @endif>
                                        @endif

                                        @error($fieldName)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                            @endif

                            <hr class="my-4">

                            <div class="d-grid gap-2">
                                {{-- Используем те же кнопки, что и в вашем красивом шаблоне --}}
                                <button type="submit" name="generate_pdf" class="btn btn-primary btn-lg">
                                    <i class="bi bi-file-earmark-pdf-fill me-2"></i> {{ __('messages.generate_pdf') }}
                                </button>
                                <button type="submit" name="generate_docx" class="btn btn-outline-secondary">
                                    <i class="bi bi-file-earmark-word-fill me-2"></i> {{ __('messages.download_docx') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
