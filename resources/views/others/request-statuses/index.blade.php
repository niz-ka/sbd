@php $this_page = "others.request-statuses" @endphp
<x-main-layout>
    <div class="flex justify-between items-center">
        <x-search :page="$this_page" />
        <x-create-button :page="$this_page" />
    </div>
    <x-status-message />
    <x-tab header="Statusy wniosku">
        <table class="custom-table">
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Akcja</th>
            </tr>
            @foreach ($request_statuses as $request_status)
                <tr>
                    <td>{{ $request_status->id }}</td>
                    <td>{{ $request_status->name }}</td>
                    <td class="w-full">{{ $request_status->description }}</td>
                    <td>
                        <x-action-buttons :page="$this_page" :resource="$request_status" />
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            {{ $request_statuses->links() }}
        </div>
    </x-tab>
</x-main-layout>
