<div class="flex items-center">
    <input class="cursor-pointer" id="{{ $value }}" type="radio" name="{{ $name }}" value="{{ $value }}" @if((old($name) === $value) || (($first ?? false) === true && !old($name)) ) checked @endif />
    <label class="ml-2 cursor-pointer" for="{{ $value }}">
        {{ $description }}
    </label>
</div>
