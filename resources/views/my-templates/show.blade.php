@extends('layouts.app')

@section('title', __('messages.fill_template_title', ['name' => $template->name]))

@push('styles')
    <style>
        .profile-layout {
            background-color: var(--bg-secondary, #faf7ff);
            padding: 4rem 0;
        }
        .form-container {
            background-color: var(--bg-primary, #fff);
            border-radius: 24px;
            padding: 2.5rem;
            border: 1px solid var(--border, #e5e1f5);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
        }
        .modern-form-label {
            font-weight: 600;
            color: var(--text-secondary, #4c495d);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        .modern-form-control {
            display: block;
            width: 100%;
            background-color: var(--bg-secondary, #faf7ff) !important;
            border: 1px solid var(--border, #e5e1f5) !important;
            border-radius: 12px !important;
            padding: 0.75rem 1rem !important;
            color: var(--text-primary, #1e1b31) !important;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            height: auto !important;
        }
        .modern-form-control:focus {
            outline: none !important;
            border-color: var(--primary, #8b5cf6) !important;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2) !important;
            background-color: var(--bg-primary, #fff) !important;
        }
        .btn-modern {
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-primary-modern {
            background: var(--gradient-brand, linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%));
            color: white;
        }
        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
            color: white;
        }
        .btn-secondary-modern {
            background-color: var(--bg-secondary, #faf7ff);
            color: var(--text-secondary, #4c495d);
            border: 1px solid var(--border, #e5e1f5);
        }
        .btn-secondary-modern:hover {
            background-color: var(--border, #e5e1f5);
            color: var(--text-primary, #1e1b31);
        }
    </style>
@endpush

@section('content')
    <div class="profile-layout">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-container">
                        <div class="text-center mb-4">
                            <h1 class="h3" style="color: var(--text-primary);">{{ $template->name }}</h1>
                            <p class="text-muted">{{ __('messages.category') }}: {{ $template->category->name }} ({{$template->country_code}})</p>
                        </div>

                        <form action="{{ route('profile.my-templates.generate', ['locale' => app()->getLocale(), 'userTemplate' => $template->id]) }}" method="POST">
                            @csrf
                            @php
                                $fields = is_array($template->fields) ? $template->fields : json_decode($template->fields, true) ?? [];
                            @endphp

                            @foreach($fields as $field)
                                <div class="mb-3">
                                    <label for="{{ $field['key'] }}" class="form-label modern-form-label">{{ $field['label'] }}</label>
                                    @php $fieldType = $field['type'] ?? 'text'; @endphp
                                    <input type="{{ $fieldType }}"
                                           id="{{ $field['key'] }}"
                                           name="{{ $field['key'] }}"
                                           class="form-control modern-form-control @error($field['key']) is-invalid @enderror"
                                           value="{{ old($field['key']) }}"
                                           required>
                                    @error($field['key'])
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach

                            <hr class="my-4" style="border-color: var(--border);">

                            <div class="d-grid gap-2">
                                <button type="submit" name="generate_pdf" value="1" class="btn btn-primary-modern btn-modern btn-lg">
                                    <i class="bi bi-file-earmark-pdf-fill me-2"></i> {{ __('messages.create_pdf_button') }}
                                </button>
                                <button type="submit" name="generate_docx" value="1" class="btn btn-secondary-modern btn-modern btn-lg">
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
