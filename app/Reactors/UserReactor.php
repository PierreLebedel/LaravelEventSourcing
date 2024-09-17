<?php

namespace App\Reactors;

use App\Models\User;
use App\StorableEvents\User\UserCreatedEvent;

class UserReactor extends ModelReactor
{
    public function onCreated(UserCreatedEvent $event)
    {
        $user = User::uuid($event->aggregateRootUuid());
        // $user->sendEmailVerificationNotification();
    }
}
