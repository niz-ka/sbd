<div class="bg-gradient-to-b from-blue-500 to-blue-800 text-white rounded-lg shadow-lg {{ $classes ?? '' }}">
    <h2 class="p-2 text-lg">{{ $header }}</h2>
    <div class="bg-white text-black p-8 rounded-b-lg">
        {{ $slot }}
    </div>
</div>
