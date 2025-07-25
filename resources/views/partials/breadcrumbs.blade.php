@if (isset($items) && count($items) > 0)
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
@endif
