@php $this_page = "others.account-types" @endphp
<x-main-layout>
    <x-back-button />
    <x-tab header="Edytuj rodzaj rachunku" classes="form-tab">
        <x-edit-form :page="$this_page" :resource="$account_type">
            <div class="grid grid-cols-4 gap-10">
                <x-input name="name" description="Nazwa" type="text" value="{{ $account_type->name }}" classes="col-span-3" />
                <x-input name="symbol" description="Skrót" type="text" value="{{ $account_type->symbol }}" />
            </div>
            <x-textarea name="description" description="Opis" value="{{ $account_type->description }}" />
        </x-edit-form>
    </x-tab>
</x-main-layout>
