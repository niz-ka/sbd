<li class="p-2 rounded-lg {{ request()->routeIs($page) ? '' : "" }}">
    <a href="{{ route($page) }}" class="w-full h-full block">
        <i class="{{ $icon }}"></i>{{ $slot }}
    </a>
</li>
