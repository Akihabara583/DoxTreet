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

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    {{-- Scripts & Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- ИЗМЕНЕНИЕ: Добавлена эта строка, чтобы стили со страниц загружались --}}
    @stack('styles')

    <style>
        /* Добавьте эти стили в секцию @push('styles') вашего layouts/app.blade.php */

        /* ========== HEADER STYLES ========== */
        .navbar {
            background: var(--glass-bg) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-sm);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary) !important;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            color: var(--primary) !important;
        }

        .navbar-brand sup {
            font-size: 0.6em;
            color: var(--primary);
            font-weight: 600;
        }

        /* Навигационные ссылки */
        .navbar-nav .nav-link {
            color: var(--text-secondary) !important;
            font-weight: 500;
            padding: 0.75rem 1rem !important;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            margin: 0 0.25rem;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary) !important;
            background: var(--glass-bg);
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link.active {
            color: var(--primary) !important;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
        }

        .navbar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 2px;
            background: var(--gradient-brand);
            border-radius: 2px;
        }

        /* Кнопки в навбаре */
        .navbar-nav .nav-link.btn {
            background: var(--gradient-brand) !important;
            color: white !important;
            border: none;
            font-weight: 600;
            padding: 0.6rem 1.5rem !important;
            border-radius: 20px;
            box-shadow: var(--shadow-sm);
        }

        .navbar-nav .nav-link.btn:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: var(--shadow-lg);
            color: white !important;
        }

        /* Dropdown меню */
        .dropdown-menu {
            background: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            padding: 0.75rem 0;
            margin-top: 0.5rem;
        }

        .dropdown-item {
            color: var(--text-secondary);
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 0;
        }

        .dropdown-item:hover {
            background: var(--bg-secondary);
            color: var(--primary);
            transform: none;
        }

        .dropdown-item.text-danger:hover {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .dropdown-item i {
            width: 18px;
            color: var(--text-muted);
            transition: color 0.3s ease;
        }

        .dropdown-item:hover i {
            color: inherit;
        }

        .dropdown-divider {
            border-color: var(--border);
            margin: 0.5rem 0;
        }

        /* Мобильное меню */
        .navbar-toggler {
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(139, 92, 246, 0.25);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 37, 41, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        [data-bs-theme="dark"] .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: var(--bg-primary);
                border: 1px solid var(--border);
                border-radius: 16px;
                margin-top: 1rem;
                padding: 1rem;
                box-shadow: var(--shadow-lg);
            }

            .navbar-nav .nav-link {
                margin: 0.25rem 0;
                text-align: center;
            }

            .navbar-nav .nav-link.btn {
                margin-top: 1rem;
            }
        }

        /* ========== FOOTER STYLES ========== */
        footer {
            background: linear-gradient(135deg, #1a1625 0%, #252031 50%, #0f0a1a 100%) !important;
            border-top: 1px solid rgba(139, 92, 246, 0.3);
            position: relative;
            overflow: hidden;
            color: #f1f0ff !important;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 20%, rgba(139, 92, 246, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(6, 182, 212, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        footer .container {
            position: relative;
            z-index: 1;
        }

        footer h5 {
            color: #f1f0ff !important;
            font-weight: 800;
            position: relative;
            margin-bottom: 1.5rem;
        }

        footer h5::after {
            content: '';
            position: absolute;
            bottom: -0.5rem;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--gradient-brand);
            border-radius: 2px;
        }

        footer h5 sup {
            color: var(--primary);
            font-size: 0.6em;
        }

        footer p {
            color: rgba(201, 198, 224, 0.8) !important;
            line-height: 1.6;
        }

        footer .footer-link {
            color: rgba(201, 198, 224, 0.7) !important;
            text-decoration: none !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            display: inline-block;
        }

        footer .footer-link:hover {
            color: var(--primary) !important;
            transform: translateX(4px);
        }

        footer .footer-link::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-brand);
            transition: width 0.3s ease;
        }

        footer .footer-link:hover::before {
            width: 100%;
        }

        footer ul li {
            transition: all 0.3s ease;
        }

        footer ul li:hover {
            transform: translateX(2px);
        }

        footer .border-top {
            border-color: rgba(139, 92, 246, 0.3) !important;
            position: relative;
        }

        footer .border-top::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 1px;
            background: var(--gradient-brand);
        }

        footer .text-white-50 {
            color: rgba(201, 198, 224, 0.7) !important;
        }

        footer .border-secondary-subtle {
            border-color: rgba(139, 92, 246, 0.3) !important;
        }

        /* Темная тема для навбара */
        [data-bs-theme="dark"] .navbar {
            background: rgba(15, 10, 26, 0.9) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(139, 92, 246, 0.2);
        }

        [data-bs-theme="dark"] footer {
            background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-tertiary) 100%) !important;
        }

        /* Анимации */
        @keyframes navItemFadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-nav .nav-item {
            animation: none !important;
        }
        .navbar-nav .nav-item:nth-child(1),
        .navbar-nav .nav-item:nth-child(2),
        .navbar-nav .nav-item:nth-child(3),
        .navbar-nav .nav-item:nth-child(4),
        .navbar-nav .nav-item:nth-child(5) {
            animation-delay: 0s !important;
        }

        /* Дополнительные эффекты */
        .navbar-brand svg {
            transition: all 0.3s ease;
        }

        .navbar-brand:hover svg {
            transform: rotate(360deg) scale(1.1);
        }

        /* Мобильные улучшения */
        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.25rem;
            }

            footer .col-lg-5 {
                text-align: center;
                margin-bottom: 2rem;
            }

            footer h5::after {
                left: 50%;
                transform: translateX(-50%);
            }
        }

        /* Accessibility улучшения */
        .navbar-nav .nav-link:focus,
        .dropdown-item:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
            border-radius: 8px;
        }

        /* Печать */
        @media print {
            .navbar,
            footer {
                display: none !important;
            }
        }
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
        .footer-link {
            transition: color 0.2s ease-in-out;
        }

        .footer-link:hover {
            color: #ffffff !important; /* !important нужен, чтобы перебить стиль .text-white-50 */
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

@include('partials.header')
<x-alert />
<main class="flex-grow-1">
    @yield('content')
</main>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@include('partials.cookie_consent_banner')
@stack('scripts')
</body>
</html>
