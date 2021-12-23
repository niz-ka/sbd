@php $this_page = "others.request-types" @endphp
<x-main-layout>
    <div class="flex justify-between items-center">
        <x-search :page="$this_page" />
        <x-create-button :page="$this_page" />
    </div>
    <x-status-message />
    <x-tab header="Rodzaje wniosku">
            <table class="custom-table">
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Akcja</th>
                </tr>
                @foreach ($request_types as $request_type)
                    <tr>
                        <td>{{ $request_type->id }}</td>
                        <td>{{ $request_type->name }}</td>
                        <td class="w-full">{{ $request_type->description }}</td>
                        <td>
                            <x-action-buttons :page="$this_page" :resource="$request_type" />
                        </td>
                    </tr>
                @endforeach
            </table>
        <div>
           {{ $request_types->links() }}
        </div>
    </x-tab>
</x-main-layout>
