<x-main-layout>
    <x-back-button />
    <x-tab header="Pokaż przelew" classes="form-tab">
        <div class="flex flex-col gap-3">
            <div><b>Identyfikator przelewu:</b> {{ $transfer->id}}</div>
            <div><b>Data przelewu:</b> {{ $transfer->transfer_date }}</div>
            <div><b>Kwota:</b> {{ sprintf("%0.2f [PLN]", round($transfer->amount, 2)) }}</div>
            <div><b>Tytuł przelewu:</b> {{ $transfer->title }}</div>
            <div><b>Rachunek odbiorcy:</b> {{ $transfer->receiver_number }}</div>
            <div><b>Dane odbiorcy<br /></b> {{ $transfer->receiver_data ?? '-' }}</div>
            <b>Rodzaj przelewu</b>
            <ul class="pl-5">
               <li><b>Nazwa:</b> {{ $transfer->transfer_type->name }}</li>
                <li><b>Opis:</b> {{ $transfer->transfer_type->description }}</li>
            </ul>
            <b>Nadawca</b>
            <ul class="pl-5">
                <li><b>Numer rachunku:</b> {{ $transfer->account->number }}</li>
                <li>
                    <b class="block my-3">Klient</b>
                    <ul class="pl-5">
                        <li><b>Imię i nazwisko:</b> {{ $transfer->account->customer->full_name }}</li>
                        <li><b>Typ klienta:</b> {{ $transfer->account->customer->customer_kind }}</li>
                    </ul>
                </li>
            </ul>
        </div>
    </x-tab>
</x-main-layout>
