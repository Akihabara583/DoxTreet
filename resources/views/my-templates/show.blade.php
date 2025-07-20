@extends('layouts.app')

@section('title', __('messages.fill_template_title', ['name' => $template->name]))

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="text-center">
                    <h1>{{ $template->name }}</h1>
                    <p class="lead text-muted">{{ __('messages.category') }}: {{ $template->category->name }} ({{$template->country_code}})</p>
                </div>

                <div class="card shadow-sm mt-4">
                    <div class="card-body p-4">

                        <form action="{{ route('profile.my-templates.generate', ['locale' => app()->getLocale(), 'userTemplate' => $template->id]) }}" method="POST">
                            @csrf

                            @php
                                $fields = is_array($template->fields) ? $template->fields : json_decode($template->fields, true) ?? [];
                            @endphp

                            @foreach($fields as $field)
                                <div class="mb-3">
                                    <label for="{{ $field['key'] }}" class="form-label">{{ $field['label'] }}</label>

                                    @php
                                        $fieldType = $field['type'] ?? 'text';
                                    @endphp

                                    @if($fieldType === 'date')
                                        <input type="date"
                                               id="{{ $field['key'] }}"
                                               name="{{ $field['key'] }}"
                                               class="form-control @error($field['key']) is-invalid @enderror"
                                               value="{{ old($field['key']) }}"
                                               required>

                                    @elseif($fieldType === 'number')
                                        <input type="number"
                                               id="{{ $field['key'] }}"
                                               name="{{ $field['key'] }}"
                                               class="form-control @error($field['key']) is-invalid @enderror"
                                               value="{{ old($field['key']) }}"
                                               required>

                                    @else
                                        <input type="text"
                                               id="{{ $field['key'] }}"
                                               name="{{ $field['key'] }}"
                                               class="form-control @error($field['key']) is-invalid @enderror"
                                               value="{{ old($field['key']) }}"
                                               required>
                                    @endif

                                    @error($field['key'])
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach

                            <hr class="my-4">

                            <div class="d-grid gap-2">
                                <button type="submit" name="generate_pdf" value="1" class="btn btn-primary btn-lg">
                                    <i class="bi bi-file-earmark-pdf-fill me-2"></i> {{ __('messages.create_pdf_button') }}
                                </button>
                                <button type="submit" name="generate_docx" value="1" class="btn btn-secondary btn-lg">
                                    <i class="bi bi-file-earmark-word-fill me-2"></i> {{ __('messages.download_docx_button') }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
