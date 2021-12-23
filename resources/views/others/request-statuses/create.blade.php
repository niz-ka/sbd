@php $this_page = "others.request-statuses" @endphp
<x-main-layout>
    <x-tab header="Nowy status wniosku" classes="form-tab">
        <x-create-form :page="$this_page">
            <x-input name="name" description="Nazwa" type="text" value="{{ old('name') }}" />
        </x-create-form>
    </x-tab>
</x-main-layout>
