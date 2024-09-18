<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new #[Layout('components.layouts.guest')] class extends Component
{
    use WithFileUploads;

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public $profilePicture;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'profilePicture' => ['nullable', 'image', 'max:2048'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $profilePictureFile = $validated['profilePicture'] ?? null;
        unset($validated['profilePicture']);

        $uuid = Str::uuid()->toString();

        User::makeAggregate($uuid)
            ->register($validated)
            ->persist();

        $user = User::uuid($uuid);

        if($profilePictureFile){
            $path = $profilePictureFile->store('profile-pictures', 'local');

            $user->getAggregate()
                ->updateProfilePicture($path, 'local')
                ->persist();
        }

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register" enctype="multipart/form-data">

        <div class="flex items-center pt-2">
            <div class="flex-none rounded-full h-20 w-20 bg-gray-200 overflow-hidden mr-4">
                @if ($profilePicture) 
                    <img src="{{ $profilePicture->temporaryUrl() }}" class="object-cover h-20 w-20">
                @else
                    <img src="/img/user-profile-picture.jpg" class="object-cover h-20 w-20">
                @endif
            </div>
            <div class="grow">
                <x-input-label for="profilePicture" :value="__('Profile picture')" />
                <x-forms.file-input wire:model="profilePicture" class="mt-1 block w-full" name="profilePicture" id="profilePicture" accept="image/*" />
                <x-input-error class="mt-2" :messages="$errors->get('profilePicture')" />
            </div>
            
        </div>

        <!-- First Name -->
        <div class="mt-5">
            <x-input-label for="firstname" :value="__('First name')" />
            <x-forms.text-input wire:model="firstname" id="firstname" class="block mt-1 w-full" type="text" name="firstname" required autofocus autocomplete="firstname" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-5">
            <x-input-label for="lastname" :value="__('Last name')" />
            <x-forms.text-input wire:model="lastname" id="lastname" class="block mt-1 w-full" type="text" name="lastname" required autofocus autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-forms.text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-forms.text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-forms.text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
