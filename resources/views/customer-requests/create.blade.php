@php $this_page = "customer-requests" @endphp
<x-main-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset("custom/css/selectize.css") }}" />
    </x-slot>
    <x-back-button />
    <x-tab header="Nowy wniosek" classes="form-tab">
        <x-create-form :page="$this_page">
            <div class="grid grid-cols-4 gap-10">
                <x-select label="ID klienta" name="customer" classes="col-span-1">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old("customer") == $customer->id ? 'selected' : '' }}> {{ $customer->id }}</option>
                    @endforeach
                </x-select>

                <x-select label="Rodzaj wniosku" name="request_type" classes="col-span-3">
                    @foreach($request_types as $request_type)
                        <option value="{{ $request_type->id }}" {{ old("request_type") == $request_type->id ? 'selected' : '' }}> {{ $request_type->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <x-select label="Status wniosku" name="request_status">
                @foreach($request_statuses as $request_status)
                    <option value="{{ $request_status->id }}" {{ old("request_status") == $request_status->id ? 'selected' : '' }}> {{ $request_status->name }}</option>
                @endforeach
            </x-select>

            <x-textarea name="comment" description="Komentarz" value="{{ old('comment') }}" />

        </x-create-form>
    </x-tab>
    <x-slot name="javascript">
        <script src="{{ asset("custom/js/jquery.js") }}"></script>
        <script src="{{ asset("custom/js/selectize.js") }}"></script>
        <script>
            $(function () {
                $("#customer").selectize([]);
                $("#request_type").selectize([]);
                $("#request_status").selectize([]);
            });
        </script>
    </x-slot>
</x-main-layout>
