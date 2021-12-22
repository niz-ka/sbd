<x-main-layout>
    <x-tab header="Nowy rodzaj wniosku" classes="max-w-2xl mx-auto">
        <x-form page="others.request-types.store" method="POST">
            <x-input name="name" description="Nazwa" type="text" />
            <x-textarea name="description" description="Opis" />
        </x-form>
    </x-tab>
</x-main-layout>
