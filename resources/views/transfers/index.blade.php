@php $this_page = "transfers" @endphp
<x-main-layout>
    <div class="flex justify-between items-center">
        <x-search :page="$this_page" placeholder="Nadawca, odbiorca, data" />
        <x-create-button :page="$this_page" />
    </div>
    <x-status-message />
    <x-tab header="Przelewy">
        <table class="custom-table">
            <tr>
                <th>Lp.</th>
                <th>Rachunek nadawcy</th>
                <th>Rachunek odbiorcy</th>
                <th>Kwota [PLN]</th>
                <th>Data operacji</th>
                <th>Akcja</th>
            </tr>
            @foreach ($transfers as $transfer)
                <tr>
                    <td>{{ $transfers->firstItem() + $loop->index  }}</td>
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
    <x-tab header="Raport przelewów" classes="form-tab my-16">
        <form action="{{ route("transfers.report") }}" id="form">
            <div class="flex items-center gap-16">
                <x-input name="transfer_date" description="Data" type="date" value="" />
                <input type="submit" value="Generuj" id="submit-button" class="block cursor-pointer text-white p-2 rounded-xl m-1 bg-green-600 hover:bg-green-800">
            </div>
        </form>
        <div id="data-container"></div>
    </x-tab>

    <x-slot name="javascript">
        <script>
            function sendForm() {
                const URL = document.querySelector("#form").getAttribute("action");
                const dataContainer = document.querySelector("#data-container");
                const date = document.querySelector("#transfer_date").value;
                fetch(URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({"transfer_date": date})
                })
                .then(response => response.json())
                .then(data => {
                    if(data === "err") {
                        dataContainer.innerHTML = `<span class="text-red-500">Pole data musi być poprawną datą.</span>`;
                    } else {
                        let content = '<table class="custom-table"><tr><th>Rodzaj przelewu</th><th>Suma [PLN]</th><th>Liczba</th></tr>';
                        data.forEach(row => {
                            content += "<tr>";
                            for(const column in row) {
                                content += `<td>${row[column]}</td>`;
                            }
                            content += "</tr>";
                        });
                        content += "</table>";
                        dataContainer.innerHTML = content;
                    }
                });
            }

            document.querySelector("#submit-button").addEventListener("click", (e) => {
               e.preventDefault();
               sendForm();
            });
        </script>
    </x-slot>
</x-main-layout>
