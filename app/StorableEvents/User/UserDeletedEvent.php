<?php

namespace App\StorableEvents\User;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class UserDeletedEvent extends ShouldBeStored
{
    public function __construct()
    {
    }
}
