@php $this_page = "others.request-types" @endphp
<x-main-layout>
    <x-back-button />
    <x-tab header="Edytuj rodzaj wniosku" classes="form-tab">
        <x-edit-form :page="$this_page" :resource="$request_type">
            <x-input name="name" description="Nazwa" type="text" value="{{ $request_type->name }}" />
            <x-textarea name="description" description="Opis" value="{{ $request_type->description }}" />
        </x-edit-form>
    </x-tab>
</x-main-layout>
