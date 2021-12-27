<div class="mb-5" id="{{ $id }}">
    <label class="block text-gray-700 font-bold mb-2">
        {{ $label }}
    </label>
    {{ $slot }}
    @if($errors->has($name))
        <div class="text-red-500">{{ $errors->first($name) }}</div>
    @endif
</div>
