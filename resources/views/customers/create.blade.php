@php $this_page = "customers" @endphp
<x-main-layout>
    <x-back-button />
    <x-tab header="Nowy klient" classes="form-tab">
        <x-create-form :page="$this_page">
            <x-input name="full_name" description="Imię i nazwisko" type="text" value="{{ old('full_name') }}" />
            <div class="flex gap-16">
                <x-input name="phone" description="Telefon" type="tel" value="{{ old('phone') }}" />
                <x-input name="email" description="E-mail" type="email" value="{{ old('email') }}" />
            </div>
            <div class="grid grid-cols-10 grid-rows-2 gap-x-6">
                <x-input name="street" description="Ulica" type="text" value="{{ old('street') }}" classes="col-span-4" />
                <x-input name="number" description="Numer" type="text" value="{{ old('number') }}" classes="col-span-2" />
                <x-input name="apartment" description="Lokal" type="text" value="{{ old('apartment') }}" classes="col-span-2" />
                <x-input name="postal_code" description="Kod pocztowy" type="text" value="{{ old('postal_code') }}" classes="row-start-2 col-span-4" />
                <x-input name="city" description="Miejscowość" type="text" value="{{ old('city') }}" classes="row-start-2 col-span-4" />
            </div>
            <x-radio-group label="Typ klienta" id="kind-radios" name="customer_kind">
                <x-radio name="customer_kind" description="Indywidualny" value="indywidualny" :first="true" />
                <x-radio name="customer_kind" description="Biznesowy" value="biznesowy" />
            </x-radio-group>
            <div id="individual" style="display: none;">
                <x-input name="PESEL" description="PESEL" type="text" value="{{ old('PESEL') }}" />
            </div>
            <div id="business" style="display: none;">
                <div class="flex gap-16">
                    <x-input name="NIP" description="NIP" type="text" value="{{ old('NIP') }}" />
                    <x-input name="REGON" description="REGON" type="text" value="{{ old('REGON') }}" />
                </div>
                <x-input name="company_name" description="Nazwa firmy" type="text" value="{{ old('company_name') }}" />
            </div>
        </x-create-form>
    </x-tab>
    <x-slot name="javascript">
        <script>
            function changeForm(kind) {
                if(kind === "indywidualny") {
                    document.querySelector("#business").style.display = "none";
                    document.querySelector("#individual").style.display = "block";
                } else if(kind === "biznesowy") {
                    document.querySelector("#individual").style.display = "none";
                    document.querySelector("#business").style.display = "block";
                }
            }
            document.querySelectorAll("#kind-radios input").forEach((element) => {
                element.addEventListener("change", () => {
                    changeForm(element.value);
                });
            });
            window.addEventListener("DOMContentLoaded", () => {
                const value = document.querySelector('input[name="customer_kind"]:checked').value;
                changeForm(value);
            });

        </script>
    </x-slot>
</x-main-layout>
