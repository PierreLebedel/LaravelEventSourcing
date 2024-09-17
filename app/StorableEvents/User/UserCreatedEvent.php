<?php

namespace App\StorableEvents\User;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class UserCreatedEvent extends ShouldBeStored
{
    public function __construct(public array $attributes)
    {
    }
}
