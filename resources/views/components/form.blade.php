<form action="{{ route($page) }}" method="{{ $method }}" class="flex flex-col mx-auto max-w-2xl">
    @csrf
    {{ $slot }}
    <x-submit-button />
</form>
