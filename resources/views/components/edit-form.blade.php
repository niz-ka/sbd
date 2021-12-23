<form action="{{ route($page . ".update", $resource) }}" method="POST" class="flex flex-col mx-auto max-w-2xl">
    @method("PUT")
    @csrf
    {{ $slot }}
    <div class="text-center mx-auto">
        <input type="submit" class="cursor-pointer text-white p-2 rounded-xl m-1 bg-gradient-to-b from-green-500 to-green-600 shadow-lg hover:from-green-700 hover:to-green-800" value="Edytuj" />
    </div>
</form>
