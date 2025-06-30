<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* Подключаем шрифт, который поддерживает все нужные языки */
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }
        .document-header {
            width: 100%;
            margin-bottom: 40px;
        }
        .header-left {
            width: 50%;
            float: left;
            text-align: left;
        }
        .header-right {
            width: 50%;
            float: right;
            text-align: right;
        }
        .document-title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-top: 50px;
            margin-bottom: 30px;
            text-transform: uppercase;
        }
        .content {
            text-align: justify;
        }
        .signature-section {
            margin-top: 50px;
            width: 100%;
        }
        .signature-date {
            width: 50%;
            float: left;
        }
        .signature-name {
            width: 50%;
            float: right;
            text-align: right;
        }
        .clear {
            clear: both;
        }
        p {
            margin: 0 0 10px;
        }
        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
@yield('content')
</body>
</html>
