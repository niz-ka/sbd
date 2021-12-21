<x-main-layout>
    <x-create-button page="others.request-types.create" />
    <div class="bg-gradient-to-b from-blue-500 to-blue-800 text-white rounded-lg w-full shadow-lg">
        <h2 class="p-2 text-lg">Rodzaje wniosku</h2>
        <div class="bg-white text-black p-4 rounded-b-lg">
            <table class="w-full border">
                <tr class="text-left border">
                    <th class="border p-1">Lp.</th>
                    <th class="border p-1">Nazwa</th>
                    <th class="border p-1">Opis</th>
                    <th class="border p-1">Akcja</th>
                </tr>
                @foreach ($request_types as $request_type)
                    <tr class="border">
                        <td class="border p-1">{{ $request_type->id }}</td>
                        <td class="border p-1">{{ $request_type->name }}</td>
                        <td class="border p-1">{{ $request_type->description }}</td>
                        <td>
                            <div class="flex">
                                <x-action-button page="others.request-types.edit" :resource="$request_type" classes="bg-blue-600 hover:bg-blue-800">Edytuj</x-action-button>
                                <x-action-button page="others.request-types.destroy" :resource="$request_type"  classes="bg-red-600 hover:bg-red-800">Usuń</x-action-button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-main-layout>
