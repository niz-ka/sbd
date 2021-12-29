@php $this_page = "loans" @endphp
<x-main-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset("custom/css/selectize.css") }}" />
    </x-slot>
    <x-back-button />
    <x-tab header="Nowy kredyt" classes="form-tab">
        <x-create-form :page="$this_page">
            <x-select label="Numer rachunku" name="account">
                @foreach($accounts as $account)
                    <option value="{{ $account->id }}" {{ old("account") == $account->id ? 'selected' : '' }}> {{ $account->number }}</option>
                @endforeach
            </x-select>

            <div class="grid grid-cols-12 gap-3">
                <x-input name="amount" description="Kwota" type="number" value="{{ old('amount') }}" attr='step="any"' classes="col-span-3" />
                <x-input name="interest_rate" description="Oprocentowanie" type="number" value="{{ old('interest_rate') }}" attr='step="any"' classes="col-span-4" />
                <x-input name="end_date" description="Data spłaty" type="date" value="{{ old('end_date') }}" classes="col-span-5" />
            </div>

            <x-textarea name="purpose" description="Cel" value="{{ old('purpose') }}" />

        </x-create-form>
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
