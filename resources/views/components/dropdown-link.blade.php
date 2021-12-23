<li class="p-2 rounded-lg {{ request()->routeIs($group) ? '' : "" }}">
    <a href="{{ route($page) }}" class="w-full h-full block">{{ $slot }}</a>
</li>
