@php $this_page = "others.request-types" @endphp
<x-main-layout>
    <x-tab header="Nowy rodzaj wniosku" classes="form-tab">
        <x-create-form :page="$this_page">
            <x-input name="name" description="Nazwa" type="text" value="{{ old('name') }}" />
            <x-textarea name="description" description="Opis" value="{{ old('description') }}" />
        </x-create-form>
    </x-tab>
</x-main-layout>
