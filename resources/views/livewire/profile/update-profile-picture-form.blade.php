<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public $previousProfilePicture;
    public $profilePicture;

    public function mount(): void
    {
        $this->previousProfilePicture = Auth::user()->getFirstMediaUrl('profile-picture', 'avatar');
    }

    public function updateProfilePicture(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'profilePicture'  => ['image', 'max:2048'],
        ]);

        $path = $this->profilePicture->store('profile-pictures', 'local');

        $user->getAggregate()
            ->updateProfilePicture($path, 'local')
            ->persist();

        $media = $user->getFirstMedia('profile-picture');

        $this->dispatch('profile-picture-updated', conversions:[
            'small'  => $media?->getUrl('small') ?? null,
            'avatar' => $media?->getUrl('avatar') ?? null,
        ]);
    }

}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile picture.") }}
        </p>
    </header>

    <form wire:submit="updateProfilePicture" class="mt-6 space-y-6" enctype="multipart/form-data">

        <div class="rounded-full h-40 w-40 bg-gray-200 overflow-hidden">
            @if ($profilePicture) 
                <img src="{{ $profilePicture->temporaryUrl() }}" class="object-cover h-40 w-40">
            @elseif($previousProfilePicture)
                <img src="{{ $previousProfilePicture }}" class="object-cover h-40 w-40">
            @endif
        </div>

        <div>
            <x-forms.input-label for="profilePicture" :value="__('Profile picture')" />
            <x-forms.file-input wire:model="profilePicture" required class="mt-1 block w-full" name="profilePicture" id="profilePicture" accept="image/*" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('profilePicture')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <div wire:loading wire:target="profilePicture" class="text-sm text-gray-600">{{ __('Uploading...') }}</div>

            <x-action-message class="me-3" on="profile-picture-updated">{{ __('Saved.') }}</x-action-message>
        </div>
    </form>
</section>
