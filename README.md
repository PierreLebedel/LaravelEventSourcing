# Laravel Event Sourcing Starter

[Laravel 11](https://github.com/laravel/laravel) fresh install with [Breeze](https://github.com/laravel/breeze) ([Livrewire](https://github.com/livewire/livewire)) and [Spatie Laravel Event Sourcing](https://github.com/spatie/laravel-event-sourcing) implementation for user registration & profile update.

Including profile picture upload with [Livrewire](https://github.com/livewire/livewire) & [Spatie Media Library](https://github.com/spatie/laravel-medialibrary).


## Development
```shell
php artisan storage:link; # create storage aliases
php artisan migrate:fresh --seed; # running migrations & seeding database
php artisan event-sourcing:replay; # replay all events to create & store datas
php artisan media-library:regenerate; #regenerate all conversions files
```


## Coding standards
```shell
composer sniff; # preview changes
composer lint; # execute changes
php artisan test; # run tests
composer clean; # lint code & run tests
```