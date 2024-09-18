<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert type="info" icon dismissible>
                <x-slot:title>{{ __("You're logged in!") }}</x-slot:title>
            </x-alert>

        </div>
    </div>
</x-layouts.app>
