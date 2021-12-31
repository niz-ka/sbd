@php $this_page = "others.transfer-types" @endphp
<x-main-layout>
    <div class="flex justify-between items-center">
        <x-search :page="$this_page" placeholder="Nazwa" />
        <x-create-button :page="$this_page" />
    </div>
    <x-status-message />
    <x-tab header="Rodzaje przelewu">
        <table class="custom-table">
            <tr>
                <th>Lp.</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Akcja</th>
            </tr>
            @foreach ($transfer_types as $transfer_type)
                <tr>
                    <td>{{ $transfer_types->firstItem() + $loop->index  }}</td>
                    <td>{{ $transfer_type->name }}</td>
                    <td class="w-full">{{ $transfer_type->description }}</td>
                    <td>
                        <x-action-buttons :page="$this_page" :resource="$transfer_type" />
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            {{ $transfer_types->links() }}
        </div>
    </x-tab>
</x-main-layout>
