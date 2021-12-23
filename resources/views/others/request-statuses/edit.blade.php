@php $this_page = "others.request-statuses" @endphp
<x-main-layout>
    <x-tab header="Edytuj status wniosku" classes="form-tab">
        <x-edit-form :page="$this_page" :resource="$request_status">
            <x-input name="name" description="Nazwa" type="text" value="{{ $request_status->name }}" />
        </x-edit-form>
    </x-tab>
</x-main-layout>
