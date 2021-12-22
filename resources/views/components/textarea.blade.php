<div class="flex flex-col w-full mb-5">
    <label class="block text-gray-700 font-bold mb-2" for="{{ $name }}">
        {{ $description }}
    </label>
    <textarea rows="5" class="shadow appearance-none border rounded py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-300" id="{{ $name }}" placeholder="{{ $description }}" name="{{ $name }}"></textarea>
    @if($errors->has($name))
        <div class="text-red-500">{{ $errors->first($name) }}</div>
    @endif
</div>
