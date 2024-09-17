<?php

namespace App\StorableEvents\User;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class UserUpdatedEvent extends ShouldBeStored
{
    public function __construct(public array $attributes)
    {
    }
}
