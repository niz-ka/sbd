<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config("app.name")  }}</title>
    {{--  Tailwind CSS  --}}
    <link href="{{ asset('custom/css/tailwind.css') }}" rel="stylesheet">
    {{--  Font Awesome  --}}
    <link href="{{ asset('custom/fontawesome/css/all.min.css') }}" rel="stylesheet">
    {{--  Lato Font  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Lato', sans-serif;">
    <div class="flex gap-2">
        {{-- Sidebar --}}
        <div class="bg-gray-800 text-gray-100 tracking-wider" style="width: 13rem; min-width: 13rem; min-height: 100vh;">
            <div class="border-b border-white p-2 mx-4 flex items-center">
                <i class="fas fa-university fa-2x"></i>
                <h2 class="pl-2 font-bold text-xl tracking-widest">E-Bank</h2>
            </div>
            <ul class="flex flex-col px-4 py-4">
                <x-nav-link page="/" icon="fas fa-users w-7">Klienci</x-nav-link>
                <x-nav-link page="#" icon="fas fa-wallet w-7">Rachunki</x-nav-link>
                <x-nav-link page="#" icon="fas fa-copy w-7">Wnioski</x-nav-link>
                <x-nav-link page="#" icon="fas fa-coins w-7">Kredyty</x-nav-link>
                <x-nav-link page="#" icon="fas fa-exchange-alt w-7">Przelewy</x-nav-link>
                {{-- Dropdown --}}
                <li class="p-2 rounded-lg">
                    <a class="w-full h-full block cursor-pointer select-none" id="dropdown-button"><i class="fas fa-caret-down w-7"></i>Pozostałe</a>
                    <ol class="text-sm flex flex-col p-2 mt-4 bg-gray-700 rounded-lg" style="display: none;" id="dropdown-menu">
                        <x-dropdown-link page="#">Rodzaje wniosku</x-dropdown-link>
                        <x-dropdown-link page="#">Statusy wniosku</x-dropdown-link>
                        <x-dropdown-link page="#">Rodzaje rachunku</x-dropdown-link>
                        <x-dropdown-link page="#">Rodzaje przelewu</x-dropdown-link>
                    </ol>
                </li>
            </ul>
        </div>
        {{-- Content --}}
        <div class="p-8">{{ $slot }}</div>
    </div>

{{-- Simple dropdown script --}}
<script>
    const dropdownButton = document.querySelector("#dropdown-button");
    const dropdown = document.querySelector("#dropdown-menu");

    dropdownButton.addEventListener("click", () => {
        if(dropdown.style.display === "none") {
            dropdown.style.display = "flex";
        } else {
            dropdown.style.display = "none";
        }
    });
</script>
</body>
</html>