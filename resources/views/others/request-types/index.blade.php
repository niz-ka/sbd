<x-main-layout>
    <x-create-button page="others.request-types.create" />
    @if(session("status"))
        {{ session("status") }}
    @endif
    <x-tab header="Rodzaje wniosku">
            <table class="w-full border">
                <tr class="text-left border">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Nazwa</th>
                    <th class="border p-2">Opis</th>
                    <th class="border p-2">Akcja</th>
                </tr>
                @foreach ($request_types as $request_type)
                    <tr class="border">
                        <td class="border p-2">{{ $request_type->id }}</td>
                        <td class="border p-2">{{ $request_type->name }}</td>
                        <td class="border p-2">{{ $request_type->description }}</td>
                        <td>
                            <div class="flex">
                                <x-action-button page="others.request-types.edit" :resource="$request_type" classes="bg-blue-600 hover:bg-blue-800">Edytuj</x-action-button>
                                <x-action-button page="others.request-types.destroy" :resource="$request_type"  classes="bg-red-600 hover:bg-red-800">Usuń</x-action-button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        <div class="mt-6">
           {{ $request_types->links() }}
        </div>
    </x-tab>
</x-main-layout>
