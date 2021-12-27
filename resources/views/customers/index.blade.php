@php $this_page = "customers" @endphp
<x-main-layout>
    <div class="flex justify-between items-center">
        <x-search :page="$this_page" />
        <x-create-button :page="$this_page" />
    </div>
    <x-status-message />
    <x-error-message />
    <x-tab header="Klienci">
        <table class="custom-table">
            <tr>
                <th>ID</th>
                <th>Imię i nazwisko</th>
                <th>Typ klienta</th>
                <th>Akcja</th>
            </tr>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->customer_kind }}</td>
                    <td class="w-1">
                        <x-action-buttons :page="$this_page" :resource="$customer" :show="true" />
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            {{ $customers->links() }}
        </div>
    </x-tab>
</x-main-layout>
