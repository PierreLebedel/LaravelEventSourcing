<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-full md:col-span-1">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-6">
                        <livewire:profile.update-profile-picture-form />
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <livewire:profile.delete-user-form />
                    </div>
                </div>
                <div class="col-span-full md:col-span-2">

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-6">
                        <livewire:profile.update-profile-information-form />
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <livewire:profile.update-password-form />
                    </div>

                    

                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
