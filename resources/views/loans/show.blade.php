<x-main-layout>
    <x-back-button />
    <x-tab header="Pokaż kredyt" classes="form-tab">
        <div class="flex flex-col gap-3">
            <div><b>Identyfikator kredytu:</b> {{ $loan->id }}</div>
            <div><b>Cel:</b> {{ $loan->purpose ?? '-' }}</div>
            <div><b>Kwota:</b> {{ sprintf("%0.2f [PLN]", round($loan->amount, 2)) }}</div>
            <div><b>Data zawarcia:</b> {{ $loan->start_date }}</div>
            <div><b>Data spłaty:</b> {{ $loan->end_date }}</div>
            <div><b>Oprocentowanie:</b> {{ sprintf("%0.2f%%", $loan->interest_rate) }}</div>
            <b>Rachunek</b>
            <ul class="pl-5">
                <li><b>Numer rachunku:</b> {{ $loan->account->number }}</li>
                <li><b>Data otwarcia:</b> {{ $loan->account->opening_date }}</li>
                <li><b>Rodzaj rachunku:</b> {{ $loan->account->account_type->name }}</li>
                <li>
                    <b class="block my-3">Klient</b>
                    <ul class="pl-5">
                        <li><b>Imię i nazwisko:</b> {{ $loan->account->customer->full_name }}</li>
                        <li><b>Typ klienta:</b> {{ $loan->account->customer->customer_kind }}</li>
                    </ul>
                </li>
            </ul>
        </div>
    </x-tab>
</x-main-layout>
