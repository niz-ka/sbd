<div class="mb-5 w-full {{ $classes ?? '' }}">
    <label for="{{ $name }}" class="block text-gray-700 font-bold mb-2">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}">
        <option></option>
        {{ $slot }}
    </select>
    @if($errors->has($name))
        <div class="text-red-500">{{ $errors->first($name) }}</div>
    @endif
</div>
