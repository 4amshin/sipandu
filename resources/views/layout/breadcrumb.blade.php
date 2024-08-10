@php
    $url = request()->getPathInfo();
    $items = explode('/', $url);
    unset($items[0]);
@endphp
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
        @foreach ($items as $key => $item)
            @if ($key == count($items))
                <li class="breadcrumb-item active" aria-current="page">{{ Str::ucfirst($item) }}</li>
            @else
                <li class="breadcrumb-item"><a href="/{{ $item }}">{{ Str::ucfirst($item) }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>
