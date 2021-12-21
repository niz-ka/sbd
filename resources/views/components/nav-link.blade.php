<li class="p-2 rounded-lg {{ request()->routeIs($page) ? 'bg-black' : "" }}">
    <a href="{{ route($page) }}" class="w-full h-full block">
        <i class="{{ $icon }}"></i>{{ $slot }}
    </a>
</li>
