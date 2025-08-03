<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'DoxTreet' }}</title>

    <!-- ИЗМЕНЕНИЕ: Добавлена иконка для вкладки (favicon) -->
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Стили для фона -->
    <style>
        body {
            background-color: #f3f4f6;
        }
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #111827;
            }
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen flex flex-col justify-center items-center p-4">
    {{ $slot }}
</div>
</body>
</html>
