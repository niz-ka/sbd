@php $this_page = "transfers" @endphp
<x-main-layout>
    <div class="flex justify-between items-center">
        <x-search :page="$this_page" />
        <x-create-button :page="$this_page" />
    </div>
    <x-status-message />
    <x-tab header="Przelewy">
        <table class="custom-table">
            <tr>
                <th>Rachunek nadawcy</th>
                <th>Rachunek odbiorcy</th>
                <th>Kwota [PLN]</th>
                <th>Data operacji</th>
                <th>Akcja</th>
            </tr>
            @foreach ($transfers as $transfer)
                <tr>
                    <td>{{ $transfer->account->number }}</td>
                    <td>{{ $transfer->receiver_number }}</td>
                    <td>{{ sprintf("%0.2f", $transfer->amount) }}</td>
                    <td>{{ $transfer->transfer_date }}</td>
                    <td class="w-1">
                        <x-action-buttons :page="$this_page" :resource="$transfer" :show="true" />
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            {{ $transfers->links() }}
        </div>
    </x-tab>
</x-main-layout>
