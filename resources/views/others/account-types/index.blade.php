@php $this_page = "others.account-types" @endphp
<x-main-layout>
    <div class="flex justify-between items-center">
        <x-search :page="$this_page" placeholder="Nazwa, skrót" />
        <x-create-button :page="$this_page"/>
    </div>
    <x-status-message />
    <x-tab header="Rodzaje rachunku">
        <table class="custom-table">
            <tr>
                <th>Lp.</th>
                <th>Nazwa</th>
                <th>Skrót</th>
                <th>Opis</th>
                <th>Akcja</th>
            </tr>
            @foreach ($account_types as $account_type)
                <tr>
                    <td>{{ $account_types->firstItem() + $loop->index  }}</td>
                    <td>{{ $account_type->name }}</td>
                    <td>{{ $account_type->symbol }}</td>
                    <td class="w-full">{{ $account_type->description }}</td>
                    <td>
                        <x-action-buttons :page="$this_page" :resource="$account_type" />
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            {{ $account_types->links() }}
        </div>
    </x-tab>
</x-main-layout>
