@php $this_page = "accounts" @endphp
<x-main-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset("custom/css/selectize.css") }}" />
    </x-slot>
    <x-back-button />
    <x-tab header="Nowy rachunek" classes="form-tab">
        <x-create-form :page="$this_page">
            <x-input name="number" description="Numer rachunku" type="text" value="{{ old('number') }}" />
            <x-input name="name" description="Nazwa" type="text" value="{{ old('name') }}" />
            <x-input name="interest_rate" description="Oprocentowanie" type="number" value="{{ old('interest_rate') }}" attr='step="any"' />

            <x-select label="Rodzaj rachunku" name="account_type">
                @foreach($account_types as $account_type)
                    <option value="{{ $account_type->id }}" {{ old("account_type") == $account_type->id ? 'selected' : '' }}> {{ $account_type->name }}</option>
                @endforeach
            </x-select>

            <div class="grid grid-cols-4 gap-12">
                <x-select label="ID klienta" name="customer" classes="col-span-2">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old("customer") == $customer->id ? 'selected' : '' }}> {{ $customer->id }}</option>
                    @endforeach
                </x-select>

                <x-select label="ID współwłaścicela" name="co_owner" classes="col-span-2">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old("co_owner") == $customer->id ? 'selected' : '' }}> {{ $customer->id }}</option>
                    @endforeach
                </x-select>
            </div>

        </x-create-form>
    </x-tab>
    <x-slot name="javascript">
        <script src="{{ asset("custom/js/jquery.js") }}"></script>
        <script src="{{ asset("custom/js/selectize.js") }}"></script>
        <script>
            $(function () {
                $("#account_type").selectize([]);
                $("#customer").selectize([]);
                $("#co_owner").selectize([]);
            });
        </script>
    </x-slot>
</x-main-layout>
