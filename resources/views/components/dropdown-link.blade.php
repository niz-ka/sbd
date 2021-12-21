<li class="p-2 rounded-lg {{ request()->routeIs($page) ? 'bg-gray-800' : "" }}">
    <a href="{{ route($page) }}" class="w-full h-full block">{{ $slot }}</a>
</li>
