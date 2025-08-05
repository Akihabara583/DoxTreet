<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{-- ИЗМЕНЕНИЕ 1: Используем название шаблона для заголовка вкладки --}}
    <title>{{ $template->title ?? 'Документ' }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
        }
        .logo {
            max-width: 150px; /* Можете изменить размер */
            max-height: 50px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

{{-- ИЗМЕНЕНИЕ 2: Блок для логотипа --}}
@php
    // ВАЖНО: Убедитесь, что у вас есть логотип по этому пути: public/images/logo.png
    // Если путь другой, измените его здесь.
    $logoPath = public_path('images/logo.png');
    if (file_exists($logoPath)) {
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc = 'data:image/png;base64,' . $logoData;
    } else {
        $logoSrc = '';
    }
@endphp

@if($logoSrc)
    <x-application-logo class="me-2" style="width: 64px; height: 64px;" />
@endif


@if(isset($header) && $header)
    <header>
        {!! $header !!}
    </header>
@endif

<main>
    {!! $body !!}
</main>

@if(isset($footer) && $footer)
    <footer>
        {!! $footer !!}
    </footer>
@endif

</body>
</html>
