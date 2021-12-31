@php $this_page = "accounts" @endphp
<x-main-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset("custom/css/selectize.css") }}" />
    </x-slot>
    <x-back-button />
    <x-tab header="Edytuj rachunek" classes="form-tab">
        <x-edit-form :page="$this_page" :resource="$account">
            <x-input name="number" description="Numer rachunku" type="text" value="{{ $account->number }}" />
            <x-input name="name" description="Nazwa" type="text" value="{{ $account->name }}" />
            <div class="flex gap-16">
                <x-input name="interest_rate" description="Oprocentowanie" type="number" value="{{ $account->interest_rate }}" attr='step="any"' />
                <x-input name="balance" description="Saldo" type="number" value="{{ round($account->balance, 2) }}" attr='step="any"' />
            </div>
            <x-select label="Rodzaj rachunku" name="account_type">
                @foreach($account_types as $account_type)
                    <option value="{{ $account_type->id }}" {{ $account->account_type->id == $account_type->id ? 'selected' : '' }}> {{ $account_type->name }}</option>
                @endforeach
            </x-select>
            <div class="grid grid-cols-4 gap-12">
                <x-select label="ID klienta" name="customer" classes="col-span-2">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $account->customer_id == $customer->id ? 'selected' : '' }}> {{ $customer->id }}</option>
                    @endforeach
                </x-select>

                <x-select label="ID współwłaściciela" name="co_owner" classes="col-span-2">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" @if($account->co_owner) {{ $account->co_owner->id == $customer->id ? 'selected' : '' }} @endif> {{ $customer->id }}</option>
                    @endforeach
                </x-select>
            </div>

        </x-edit-form>
    </x-tab>

    <x-slot name="javascript">
        <script src="{{ asset("custom/js/jquery.js") }}"></script>
        <script src="{{ asset("custom/js/selectize.js") }}"></script>
        <script>
            $(function () {
                $("#account_type").selectize([]);
                $("#co_owner").selectize([]);
                $("#customer").selectize([]);
            });
        </script>
    </x-slot>
</x-main-layout>
