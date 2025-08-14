<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DoxTreet') }}</title>

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    {{-- Scripts & Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Main CSS Variables from the new design */
        :root {
            --primary: #8b5cf6;
            --primary-hover: #7c3aed;
            --secondary: #64748b;
            --danger: #ef4444;
            --bg-primary: #ffffff;
            --bg-secondary: #faf7ff;
            --text-primary: #1e1b31;
            --text-secondary: #4c495d;
            --text-muted: #6b7280;
            --border: #e5e1f5;
            --shadow-lg: 0 10px 15px -3px rgb(139 92 246 / 0.15), 0 4px 6px -4px rgb(139 92 246 / 0.05);
            --gradient-brand: linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%);
        }

        [data-bs-theme="dark"] {
            --bg-primary: #0f0a1a;
            --bg-secondary: #1a1625;
            --text-primary: #f1f0ff;
            --text-secondary: #c9c6e0;
            --text-muted: #9490a8;
            --border: #2d2438;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .guest-layout {
            background-color: var(--bg-secondary);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .auth-container {
            width: 100%;
            max-width: 450px;
            background-color: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-logo a {
            display: inline-block;
        }

        /*
         * CSS Overrides for Laravel Breeze Components
         * This targets the classes that the `x-` components render
         * to make them match the new design without changing the blade files.
        */
        .form-label, label {
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-align: left;
            display: block;
        }

        .form-control, input[type="text"], input[type="email"], input[type="password"] {
            display: block;
            width: 100%;
            background-color: var(--bg-secondary) !important;
            border: 1px solid var(--border) !important;
            border-radius: 12px !important;
            padding: 0.75rem 1rem !important;
            color: var(--text-primary) !important;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            height: auto;
        }

        .form-control:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            outline: none !important;
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2) !important;
            background-color: var(--bg-primary) !important;
        }

        .btn-primary, button[type="submit"] {
            background: var(--gradient-brand) !important;
            color: white !important;
            border-radius: 16px !important;
            padding: 0.75rem 2rem !important;
            font-weight: 600 !important;
            font-size: 1rem !important;
            transition: all 0.3s ease !important;
            border: none !important;
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary:hover, button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .form-check-label {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="guest-layout">
    <div class="auth-container">
        <div class="auth-logo">
            <a href="{{ route('home', app()->getLocale()) }}">
                <x-application-logo style="width: 50px; height: 50px;" />
            </a>
        </div>

        {{ $slot }}
    </div>
</div>
{{-- Include Bootstrap JS for dropdowns --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
