@php $this_page = "loans" @endphp
<x-main-layout>
    <div class="flex justify-between items-center">
        <x-search :page="$this_page" placeholder="Kwota, data, numer rachunku" />
        <x-create-button :page="$this_page" />
    </div>
    <x-status-message />
    <x-tab header="Kredyty">
        <table class="custom-table">
            <tr>
                <th>Lp.</th>
                <th>Numer rachunku</th>
                <th>Kwota [PLN]</th>
                <th>Oprocentowanie [%]</th>
                <th>Data spłaty</th>
                <th>Akcja</th>
            </tr>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loans->firstItem() + $loop->index  }}</td>
                    <td>{{ $loan->account->number }}</td>
                    <td>{{ sprintf("%0.2f", round($loan->amount, 2)) }}</td>
                    <td>{{ sprintf("%0.2f", $loan->interest_rate) }}</td>
                    <td>{{ $loan->end_date }}</td>
                    <td class="w-1">
                        <x-action-buttons :page="$this_page" :resource="$loan" :show="true" />
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            {{ $loans->links() }}
        </div>
    </x-tab>
</x-main-layout>
