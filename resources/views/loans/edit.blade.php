@php $this_page = "loans" @endphp
<x-main-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset("custom/css/selectize.css") }}" />
    </x-slot>
    <x-back-button />
    <x-tab header="Edytuj kredyt" classes="form-tab">
        <x-edit-form :page="$this_page" :resource="$loan">
            <x-select label="Numer rachunku" name="account">
                @foreach($accounts as $account)
                    <option value="{{ $account->id }}" {{ $loan->account_id == $account->id ? 'selected' : '' }}> {{ $account->number }}</option>
                @endforeach
            </x-select>

            <div class="grid grid-cols-12 gap-3">
                <x-input name="amount" description="Kwota" type="number" value="{{ $loan->amount }}" attr='step="any"' classes="col-span-3" />
                <x-input name="interest_rate" description="Oprocentowanie" type="number" value="{{ $loan->interest_rate }}" attr='step="any"' classes="col-span-4" />
                <x-input name="end_date" description="Data spłaty" type="date" value="{{ $loan->end_date }}" classes="col-span-5" />
            </div>

            <x-textarea name="purpose" description="Cel" value="{{ $loan->purpose }}" />
        </x-edit-form>
    </x-tab>

    <x-slot name="javascript">
        <script src="{{ asset("custom/js/jquery.js") }}"></script>
        <script src="{{ asset("custom/js/selectize.js") }}"></script>
        <script>
            $(function () {
                $("#account").selectize([]);
            });
        </script>
    </x-slot>
</x-main-layout>
