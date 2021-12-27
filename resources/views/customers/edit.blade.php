@php $this_page = "customers" @endphp
<x-main-layout>
    <x-back-button />
    <x-tab header="Edytuj klienta" classes="form-tab">
        <x-edit-form :page="$this_page" :resource="$customer">
            <x-input name="full_name" description="Imię i nazwisko" type="text" value="{{ $customer->full_name }}" />
            <div class="flex gap-16">
                <x-input name="phone" description="Telefon" type="tel" value="{{ $customer->phone }}" />
                <x-input name="email" description="E-mail" type="email" value="{{ $customer->email }}" />
            </div>
            <div class="grid grid-cols-10 grid-rows-2 gap-x-6">
                <x-input name="street" description="Ulica" type="text" value="{{ $customer->address->street }}" classes="col-span-4" />
                <x-input name="number" description="Numer" type="text" value="{{ $customer->address->number }}" classes="col-span-2" />
                <x-input name="apartment" description="Lokal" type="text" value="{{ $customer->address->apartment }}" classes="col-span-2" />
                <x-input name="postal_code" description="Kod pocztowy" type="text" value="{{ $customer->address->postal_code }}" classes="row-start-2 col-span-4" />
                <x-input name="city" description="Miejscowość" type="text" value="{{ $customer->address->city }}" classes="row-start-2 col-span-4" />
            </div>
            @if($customer->customer_kind === "indywidualny")
                <x-input name="PESEL" description="PESEL" type="text" value="{{ $customer->PESEL }}" />
            @elseif($customer->customer_kind === "biznesowy")
                <div class="flex gap-16">
                    <x-input name="NIP" description="NIP" type="text" value="{{ $customer->NIP }}" />
                    <x-input name="REGON" description="REGON" type="text" value="{{ $customer->REGON }}" />
                </div>
                <x-input name="company_name" description="Nazwa firmy" type="text" value="{{ $customer->company_name }}" />
            @endif
        </x-edit-form>
    </x-tab>
</x-main-layout>
