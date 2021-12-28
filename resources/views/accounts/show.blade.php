<x-main-layout>
    <x-back-button />
    <x-tab header="Pokaż rachunek" classes="form-tab">
        <div class="flex flex-col gap-3">
            <div><b>Numer rachunku:</b> {{ $account->number }}</div>
            <div><b>Nazwa:</b> {{ $account->name ?? '-' }}</div>
            <div><b>Saldo:</b> {{ sprintf("%0.2f PLN", round($account->balance, 2)) }}</div>
            <div><b>Oprocentowanie:</b> {{ sprintf("%0.2f%%", round($account->interest_rate, 2)) }}</div>
            <div><b>Data otwarcia:</b> {{ $account->opening_date }}</div>
            <b>Rodzaj rachunku</b>
            <ul class="pl-5">
                <li><b>Nazwa:</b> {{ $account->account_type->name }} ({{ $account->account_type->symbol }})</li>
                <li><b>Opis:</b> {{ $account->account_type->description }}</li>
            </ul>
            <b>Właścicel</b>
            <ul class="pl-5">
                <li><b>Identyfikator klienta:</b> {{ $account->customer->id }}</li>
                <li><b>Imię i nazwisko:</b> {{ $account->customer->full_name }}</li>
                <li><b>Typ klienta:</b> {{ $account->customer->customer_kind }}</li>
                <li><b>Telefon:</b> {{ $account->customer->phone ?? '-' }}</li>
                <li><b>E-mail:</b> {{ $account->customer->email ?? '-' }}</li>
            </ul>
            <b>Współwłaścicel</b>
            <ul class="pl-5">
                @if($account->co_owner)
                    <li><b>Identyfikator klienta:</b> {{ $account->co_owner->id }}</li>
                    <li><b>Imię i nazwisko:</b> {{ $account->co_owner->full_name }}</li>
                    <li><b>Typ klienta:</b> {{ $account->co_owner->customer_kind }}</li>
                    <li><b>Telefon:</b> {{ $account->co_owner->phone ?? '-' }}</li>
                    <li><b>E-mail:</b> {{ $account->co_owner->email ?? '-' }}</li>
                @else
                    <li>Brak</li>
                @endif
            </ul>
        </div>
    </x-tab>
</x-main-layout>
