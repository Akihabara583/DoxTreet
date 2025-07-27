<div class="list-group">
    <a href="{{ route('profile.show', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.show') ? 'active' : '' }}">
        <i class="bi bi-person-circle"></i> {{ __('messages.overview') }}
    </a>
    <a href="{{ route('profile.edit', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
        <i class="bi bi-pencil-square"></i> {{ __('messages.edit_profile') }}
    </a>
    <a href="{{ route('profile.history', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.history') ? 'active' : '' }}">
        <i class="bi bi-clock-history"></i> {{ __('messages.document_history') }}
    </a>
    <a href="{{ route('profile.my-data', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-data') ? 'active' : '' }}">
        <i class="bi bi-safe"></i> {{ __('messages.my_data') }}
    </a>
    {{-- Я исправил этот маршрут, чтобы он вел на правильную страницу подписки --}}
    <a href="{{ route('profile.subscription', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.subscription') ? 'active' : '' }}">
        <i class="bi bi-gem"></i> {{ __('messages.my_subscription') }}
    </a>
    <a href="{{ route('profile.signed-documents.history', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.signed-documents.history') ? 'active' : '' }}">
        <i class="bi bi-pen"></i> {{ __('messages.signed_documents') }}
    </a>
    <a href="{{ route('profile.my-templates.index', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.index') ? 'active' : '' }}">
        <i class="bi bi-collection me-2"></i> {{ __('messages.my_templates') }}
    </a>
    <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.create') ? 'active' : '' }}">
        <i class="bi bi-plus-circle me-2"></i> {{ __('messages.create_template') }}
    </a>
</div>
