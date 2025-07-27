<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'DoxTreet'))</title>

    <meta name="description" content="@yield('description', __('messages.seo_default_description'))">
    <link rel="canonical" href="{{ url()->current() }}" />
    @yield('hreflangs')

    {{-- Social Meta Tags --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="{{ asset('og-image.png') }}">
    <meta property="og:site_name" content="{{ config('app.name', 'DoxTreet') }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z' fill='%230D6EFD' fill-opacity='0.3'/><path d='M14 2V8H20' stroke='%230D6EFD' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/><path d='M9 13H15' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/><path d='M9 17H15' stroke='white' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/></svg>">

    {{-- Scripts & Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- ИЗМЕНЕНИЕ: Добавлена эта строка, чтобы стили со страниц загружались --}}
    @stack('styles')

    <style>
        html {
            /* Устанавливаем базовый размер шрифта в 90% от стандартного */
            font-size: 90%;
        }
        :root {
            --bs-primary: #0D6EFD;
            --bs-dark: #212529;
            --bs-light: #f8f9fa;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bs-light);
            color: var(--bs-dark);
        }
        .navbar-brand span {
            font-weight: 700;
        }
        .navbar {
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-primary {
            transition: all 0.2s ease-in-out;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(var(--bs-primary-rgb), 0.3);
        }
        .card {
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,.07);
        }
        .footer {
            background-color: var(--bs-dark);
            color: #adb5bd;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

@include('partials.header')
<x-alert />
<main class="flex-shrink-0">
    @yield('content')
</main>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@include('partials.cookie_consent_banner')
@stack('scripts')
</body>
</html>
