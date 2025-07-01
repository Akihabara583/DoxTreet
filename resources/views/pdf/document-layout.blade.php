<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title ?? 'Документ' }}</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 12px; }
        .content-block { margin-bottom: 20px; }
        /* Вы можете добавлять сюда любые общие стили */
    </style>
</head>
<body>

@if(!empty($header))
    <header class="content-block">
        {!! $header !!}
    </header>
@endif

<main class="content-block">
    {!! $body !!}
</main>

@if(!empty($footer))
    <footer class="content-block">
        {!! $footer !!}
    </footer>
@endif

</body>
</html>
