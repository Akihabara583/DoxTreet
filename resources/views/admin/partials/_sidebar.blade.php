<div class="list-group">
    <a href="{{ route('admin.dashboard', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> {{ __('messages.dashboard') }}
    </a>
    <a href="{{ route('admin.categories.index', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
        <i class="bi bi-tags"></i> {{ __('messages.categories') }}
    </a>
    <a href="{{ route('admin.templates.index', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.templates.*') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-text"></i> {{ __('messages.templates') }}
    </a>
    {{-- Новая ссылка на Статьи --}}
    <a href="{{ route('admin.posts.index', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
        <i class="bi bi-newspaper"></i> Статьи
    </a>
</div>
