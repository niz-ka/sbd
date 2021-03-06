<div class="flex justify-end">
    @if(($show ?? false) === true)
        <a href="{{ route($page . ".show", $resource) }}" class="text-white p-2 rounded-xl m-1 block bg-gray-600 hover:bg-gray-800">
            Pokaż
        </a>
    @endif
    <a href="{{ route($page . ".edit", $resource) }}" class="text-white p-2 rounded-xl m-1 block bg-blue-600 hover:bg-blue-800">
        Edytuj
    </a>
    <form action="{{ route($page . ".destroy", $resource) }}" method="POST">
        @method("DELETE")
        @csrf
        <input type="submit" class="cursor-pointer text-white p-2 rounded-xl m-1 block bg-red-600 hover:bg-red-800" value="Usuń">
    </form>
</div>
