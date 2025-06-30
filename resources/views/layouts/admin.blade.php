<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Panel">
    <meta name="author" content="Your Name">
    <title>@yield('title', 'Админ-панель') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts and Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Main Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Если вы используете скачанную тему SB Admin 2, используйте asset() --}}
    {{-- <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}
    <style>
        /* Просто чтобы админка выглядела прилично без скачивания полной темы */
        body { background-color: #f8f9fc; }
        .sidebar { background-color: #4e73df; }
        .nav-item .nav-link { color: rgba(255,255,255,.8); }
        .nav-item.active .nav-link { color: #fff; }
        .sidebar-brand { color: #fff; }
    </style>

</head>
<body id="page-top">
<div id="wrapper" class="d-flex">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar" style="width: 280px;">
        <a href="{{ route('admin.dashboard', ['locale' => app()->getLocale()]) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <i class="fas fa-laugh-wink fs-4"></i>
            <span class="fs-4 ms-2">Admin</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" aria-current="page">
                    <i class="fas fa-fw fa-tachometer-alt me-2"></i>
                    Главная
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-list me-2"></i>
                    Категории
                </a>
            </li>
            <li>
                <a href="{{ route('admin.templates.index', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.templates.*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-file-alt me-2"></i>
                    Шаблоны
                </a>
            </li>
            <li>
                <a href="{{ route('admin.posts.index', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-newspaper me-2"></i>
                    Статьи
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://via.placeholder.com/32" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="{{ route('profile.show', ['locale' => app()->getLocale()]) }}">Профиль</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout', ['locale' => app()->getLocale()]) }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Выйти</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column w-100">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <div class="container-fluid">
                    {{-- Можно добавить элементы верхней панели --}}
                </div>
            </nav>
            <main class="container-fluid">
                @yield('content')
            </main>
        </div>
        <footer class="sticky-footer bg-white mt-auto">
            <div class="container my-auto">
                <div class="copyright text-center my-auto py-3">
                    <span>Copyright &copy; {{ config('app.name') }} {{ date('Y') }}</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
