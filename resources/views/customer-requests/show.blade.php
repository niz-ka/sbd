<x-main-layout>
    <x-back-button />
    <x-tab header="Pokaż wniosek" classes="form-tab">
        <div class="flex flex-col gap-3">
            <div><b>Identyfikator wniosku:</b> {{ $customer_request->id }}</div>
            <div><b>Data złożenia:</b> {{ $customer_request->request_date }}</div>
            <div><b>Komentarz:</b> {{ $customer_request->comment ?? '-' }}</div>
            <b>Klient</b>
            <ul class="pl-5">
                <li><b>Identyfikator klienta:</b> {{ $customer_request->customer->id }}</li>
                <li><b>Imię i nazwisko:</b> {{ $customer_request->customer->full_name }}</li>
                <li><b>Typ klienta:</b> {{ $customer_request->customer->customer_kind }}</li>
                <li><b>Telefon:</b> {{ $customer_request->customer->phone ?? '-' }}</li>
                <li><b>E-mail:</b> {{ $customer_request->customer->email ?? '-' }}</li>
            </ul>
            <b>Rodzaj wniosku</b>
            <ul class="pl-5">
                <li><b>Nazwa:</b> {{ $customer_request->request_type->name }}</li>
                <li><b>Opis:</b> {{ $customer_request->request_type->description ?? '-' }}</li>
            </ul>
            <b>Status wniosku</b>
            <ul class="pl-5">
                <li><b>Status:</b> {{ $customer_request->request_status->name }}</li>
            </ul>
        </div>
    </x-tab>
</x-main-layout>
