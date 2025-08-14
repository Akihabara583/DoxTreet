@if (isset($items) && count($items) > 0)
    {{--
        This component has been restyled to match the new modern design.
        The Blade logic for looping through items remains unchanged.
    --}}
    <style>
        .modern-breadcrumbs {
            background-color: var(--bg-primary, #fff);
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            border: 1px solid var(--border, #e5e1f5);
            box-shadow: var(--shadow-sm);
            font-size: 0.9rem;
        }
        .modern-breadcrumbs .breadcrumb {
            margin-bottom: 0;
        }
        .modern-breadcrumbs .breadcrumb-item a {
            color: var(--text-secondary, #4c495d);
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .modern-breadcrumbs .breadcrumb-item a:hover {
            color: var(--primary, #8b5cf6);
        }
        .modern-breadcrumbs .breadcrumb-item.active {
            color: var(--text-primary, #1e1b31);
            font-weight: 600;
        }
        .modern-breadcrumbs .breadcrumb-item::before {
            color: var(--text-muted, #6b7280);
        }
    </style>

    <div class="modern-breadcrumbs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach ($items as $item)
                    @if (!$loop->last)
                        <li class="breadcrumb-item"><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
@endif
