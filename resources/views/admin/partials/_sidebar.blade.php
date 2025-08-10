<div class="list-group">
    {{-- Скрываем ссылку на Дашборд, если это "админ для сотрудников" --}}
    @if (!Auth::user()->isEmployeeAdmin())
        <a href="{{ route('admin.dashboard', app()->getLocale()) }}" class="list-group-item list-group-item-action">
            <i class="bi bi-speedometer"></i> Панель управления
        </a>
    @endif

    {{-- Эти три вкладки видны всем админам (и супер, и сотрудникам) --}}
    <a href="{{ route('admin.categories.index', app()->getLocale()) }}" class="list-group-item list-group-item-action">
        <i class="bi bi-tags"></i> Категории
    </a>

    <a href="{{ route('admin.templates.index', app()->getLocale()) }}" class="list-group-item list-group-item-action">
        <i class="bi bi-file-earmark-code"></i> Шаблоны
    </a>

    <a href="{{ route('admin.posts.index', app()->getLocale()) }}" class="list-group-item list-group-item-action">
        <i class="bi bi-newspaper"></i> Статьи
    </a>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.bundles.*') ? 'active' : '' }}" href="{{ route('admin.bundles.index') }}">
            <i class="bi bi-collection-fill"></i> {{ __('Пакеты документов') }}
        </a>
    </li>
    {{-- Скрываем ссылку на Пользователей, если это "админ для сотрудников" --}}
    @if (!Auth::user()->isEmployeeAdmin())
        <a href="{{ route('admin.users.index', app()->getLocale()) }}" class="list-group-item list-group-item-action">
            <i class="bi bi-people"></i> Пользователи
        </a>
    @endif
</div>
