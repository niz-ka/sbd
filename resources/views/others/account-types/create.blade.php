@php $this_page = "others.account-types" @endphp
<x-main-layout>
    <x-tab header="Nowy rodzaj rachunku" classes="form-tab">
        <x-create-form :page="$this_page">
            <div class="grid grid-cols-4 gap-10">
                <x-input name="name" description="Nazwa" type="text" value="{{ old('name') }}" classes="col-span-3" />
                <x-input name="symbol" description="Skrót" type="text" value="{{ old('symbol') }}" />
            </div>
            <x-textarea name="description" description="Opis" value="{{ old('description') }}" />
        </x-create-form>
    </x-tab>
</x-main-layout>
