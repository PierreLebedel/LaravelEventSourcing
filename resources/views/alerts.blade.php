<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <x-alert type="info" icon dismissible>
                <x-slot:title>{{ __("Title") }}</x-slot:title>
                <div>And content</div>
            </x-alert>

            <x-alert type="info" icon dismissible>
                <x-slot:title>{{ __("Only title") }}</x-slot:title>
            </x-alert>

            <x-alert type="info" icon dismissible>
                {{ __("Only content") }}
            </x-alert>

            <x-alert type="info" dismissible>
                <x-slot:title>{{ __("No icon") }}</x-slot:title>
                <div>But dismissible</div>
            </x-alert>

            <x-alert type="info" icon>
                <x-slot:title>{{ __("Not dismissible") }}</x-slot:title>
                <div>But with icon</div>
            </x-alert>

            <x-alert type="info">
                <x-slot:title>{{ __("No icon") }}</x-slot:title>
                <div>And not dismissible</div>
            </x-alert>

            <x-alert type="success" icon dismissible>
                <x-slot:title>{{ __("Success!") }}</x-slot:title>
            </x-alert>

            <x-alert type="warning" icon dismissible>
                <x-slot:title>{{ __("Warning!") }}</x-slot:title>
            </x-alert>

            <x-alert type="danger" icon dismissible>
                <x-slot:title>{{ __("Danger!") }}</x-slot:title>
            </x-alert>

        </div>
    </div>
</x-layouts.app>
