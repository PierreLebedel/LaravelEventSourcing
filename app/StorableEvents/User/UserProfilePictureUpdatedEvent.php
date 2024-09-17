<?php

namespace App\StorableEvents\User;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class UserProfilePictureUpdatedEvent extends ShouldBeStored
{
    public function __construct(public string $path, public string $disk = 'local')
    {
    }
}
