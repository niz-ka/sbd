@php $this_page = "others.transfer-types" @endphp
<x-main-layout>
    <x-back-button />
    <x-tab header="Edytuj rodzaj przelewu" classes="form-tab">
        <x-edit-form :page="$this_page" :resource="$transfer_type">
            <x-input name="name" description="Nazwa" type="text" value="{{ $transfer_type->name }}" />
            <x-textarea name="description" description="Opis" value="{{ $transfer_type->description }}" />
        </x-edit-form>
    </x-tab>
</x-main-layout>
