@php $this_page = "transfers" @endphp
<x-main-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset("custom/css/selectize.css") }}" />
    </x-slot>
    <x-back-button />
    <x-tab header="Edytuj kredyt" classes="form-tab">
        <x-edit-form :page="$this_page" :resource="$transfer">
            <x-select label="Rachunek nadawcy" name="account">
                @foreach($accounts as $account)
                    <option value="{{ $account->id }}" {{ $transfer->account_id == $account->id ? 'selected' : '' }}> {{ $account->number }}</option>
                @endforeach
            </x-select>

            <x-input name="receiver_number" description="Rachunek odbiorcy" type="text" value="{{ $transfer->receiver_number }}"  />
            <x-textarea name="receiver_data" description="Dane odbiorcy" value="{{ $transfer->receiver_data }}" />

            <x-input name="amount" description="Kwota" type="number" value="{{ $transfer->amount }}" attr='step="any"' />
            <x-input name="title" description="Tytuł przelewu" type="text" value="{{ $transfer->title }}" />

            <x-select label="Rodzaj przelewu" name="transfer_type">
                @foreach($transfer_types as $transfer_type)
                    <option value="{{ $transfer_type->id }}" {{ $transfer->transfer_type_id == $transfer_type->id ? 'selected' : '' }}> {{ $transfer_type->name }}</option>
                @endforeach
            </x-select>
        </x-edit-form>
    </x-tab>

    <x-slot name="javascript">
        <script src="{{ asset("custom/js/jquery.js") }}"></script>
        <script src="{{ asset("custom/js/selectize.js") }}"></script>
        <script>
            $(function () {
                $("#account").selectize([]);
                $("#transfer_type").selectize([]);
            });
        </script>
    </x-slot>
</x-main-layout>
