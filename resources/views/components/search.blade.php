<div class="max-w-xs w-full">
    <form action="{{ route($page . ".index") }}" method="GET">
        @csrf
        <div class="flex items-center mb-7">
            <input type="search" name="search" id="search" placeholder="Szukaj" class="appearance-none border-2 border-white p-2 shadow rounded-tl-lg rounded-bl-lg focus:outline-none focus:border-blue-500 w-full" />
            <button>
                <i class="border border-blue-500 fas fa-search text-lg bg-blue-500 p-3 text-white rounded-tr-lg rounded-br-lg shadow-sm"></i>
            </button>
        </div>
    </form>
</div>
