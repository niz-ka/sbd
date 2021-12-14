<li class="p-2 rounded-lg {{ request()->is($page) ? 'bg-black' : "" }}">
    <a href="{{ $page }}" class="w-full h-full block">{{ $slot }}</a>
</li>
