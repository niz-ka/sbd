@php $this_page = "customer-requests" @endphp
<x-main-layout>
    <div class="flex justify-between items-center">
        <x-search :page="$this_page" placeholder="Data, ID klienta" />
        <x-create-button :page="$this_page" />
    </div>
    <x-status-message />
    <x-tab header="Wnioski">
        <table class="custom-table">
            <tr>
                <th>Lp.</th>
                <th>ID klienta</th>
                <th>Rodzaj wniosku</th>
                <th>Status wniosku</th>
                <th>Data złożenia</th>
                <th>Akcja</th>
            </tr>
            @foreach ($customer_requests as $customer_request)
                <tr>
                    <td>{{ $customer_requests->firstItem() + $loop->index  }}</td>
                    <td>{{ $customer_request->customer_id }}</td>
                    <td>{{ $customer_request->request_type->name }}</td>
                    <td>{{ $customer_request->request_status->name }}</td>
                    <td>{{ $customer_request->request_date }}</td>
                    <td class="w-1">
                        <x-action-buttons :page="$this_page" :resource="$customer_request" :show="true" />
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            {{ $customer_requests->links() }}
        </div>
    </x-tab>
</x-main-layout>
