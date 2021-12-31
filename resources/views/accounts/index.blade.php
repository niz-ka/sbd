@php $this_page = "accounts" @endphp
<x-main-layout>
    <div class="flex justify-between items-center">
        <x-search :page="$this_page" placeholder="Numer rachunku, data" />
        <x-create-button :page="$this_page" />
    </div>
    <x-status-message />
    <x-tab header="Rachunki">
        <table class="custom-table">
            <tr>
                <td>Lp.</td>
                <th>Numer rachunku</th>
                <th>Nazwa</th>
                <th>saldo [PLN]</th>
                <th>Data otwarcia</th>
                <th>Akcja</th>
            </tr>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $accounts->firstItem() + $loop->index  }}</td>
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

    <x-tab header="Suma sald rachunków" classes="form-tab my-16">
        <div class="flex items-center gap-10">
            <form action="{{ route("accounts.report") }}" id="form">
                    <input type="submit" value="Podlicz" id="submit-button" class="block cursor-pointer text-white p-2 rounded-xl m-1 bg-green-600 hover:bg-green-800">
            </form>
            <div>
                Suma sald: <span id="data-container"></span>
            </div>
        </div>
    </x-tab>

    <x-slot name="javascript">
        <script>
            function sendForm() {
                const URL = document.querySelector("#form").getAttribute("action");
                const dataContainer = document.querySelector("#data-container");

                fetch(URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        let result;
                        data.forEach(obj => {
                            for(const column in obj) {
                                result = obj[column];
                            }
                        });
                        dataContainer.innerHTML = `<b class="text-lg">${result} [PLN]</b>`;
                    });
            }

            document.querySelector("#submit-button").addEventListener("click", (e) => {
                e.preventDefault();
                sendForm();
            });
        </script>
    </x-slot>
</x-main-layout>
