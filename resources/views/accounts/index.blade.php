@php $this_page = "accounts" @endphp
<x-main-layout>
    <div class="flex justify-between items-center">
        <x-search :page="$this_page" />
        <x-create-button :page="$this_page" />
    </div>
    <x-status-message />
    <x-tab header="Rachunki">
        <table class="custom-table">
            <tr>
                <th>Numer rachunku</th>
                <th>Nazwa</th>
                <th>saldo [PLN]</th>
                <th>Data otwarcia</th>
                <th>Akcja</th>
            </tr>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->number }}</td>
                    <td>{{ $account->name }}</td>
                    <td>{{ sprintf("%0.2f", round($account->balance, 2)) }}</td>
                    <td>{{ $account->opening_date }}</td>
                    <td class="w-1">
                        <x-action-buttons :page="$this_page" :resource="$account" :show="true" />
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            {{ $accounts->links() }}
        </div>
    </x-tab>
</x-main-layout>
