<x-main-layout>
    <x-back-button />
    <x-tab header="Pokaż klienta" classes="form-tab">
        <div class="flex flex-col gap-3">
            <div><b>Identyfikator klienta:</b> {{ $customer->id }}</div>
            <div><b>Imię i nazwisko:</b> {{ $customer->full_name }}</div>
            <div><b>Numer telefonu:</b> {{ $customer->phone ?? '-' }}</div>
            <div><b>Adres e-mail:</b> {{ $customer->email ?? '-' }}</div>
            <div>
                <b>Adres:</b> <br />
                {{ $customer->address->street }} {{ $customer->address->number }}{{ $customer->address->apartment ? '/' . $customer->address->apartment : '' }} <br />
                {{ $customer->address->postal_code }} {{ $customer->address->city }}
            </div>
            <div><b>Typ klienta:</b> {{ $customer->customer_kind }}</div>
            @if($customer->customer_kind === "indywidualny")
                <div><b>PESEL:</b> {{ $customer->PESEL }}</div>
            @elseif($customer->customer_kind === "biznesowy")
                <div><b>NIP:</b> {{ $customer->NIP }}</div>
                <div><b>REGON:</b> {{ $customer->REGON }}</div>
                <div><b>Nazwa firmy:</b> {{ $customer->company_name }}</div>
            @endif

        </div>
    </x-tab>
</x-main-layout>
