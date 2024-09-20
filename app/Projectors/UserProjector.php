<?php

namespace App\Projectors;

use App\Models\User;
use App\StorableEvents\User\UserCreatedEvent;
use App\StorableEvents\User\UserDeletedEvent;
use App\StorableEvents\User\UserProfilePictureUpdatedEvent;
use App\StorableEvents\User\UserUpdatedEvent;
use Illuminate\Support\Facades\Storage;
use Spatie\EventSourcing\Projections\Projection;

class UserProjector extends ModelProjector
{
    public function getModelProjection(): Projection
    {
        return new User();
    }

    public function onStartingEventReplay()
    {
        User::truncate();
    }

    public function onUserRegisteredEvent(UserCreatedEvent $event)
    {
        $attributes = $event->attributes + [
            'uuid'       => $event->aggregateRootUuid(),
            'created_at' => $event->createdAt(),
            'updated_at' => $event->createdAt(),
        ];

        (new User($attributes))
            ->writeable()
            ->save();
    }

    public function onUserProfileUpdatedEvent(UserUpdatedEvent $event)
    {
        User::uuid($event->aggregateRootUuid())
            ->writeable()
            ->update($event->attributes + [
                'updated_at' => $event->createdAt(),
            ]);
    }

    public function onUserProfilePictureUpdatedEvent(UserProfilePictureUpdatedEvent $event)
    {
        if(!Storage::disk($event->disk)->exists($event->path)){
            return;
        }

        User::uuid($event->aggregateRootUuid())
            ->addMedia(Storage::disk($event->disk)->path($event->path))
            ->preservingOriginal()
            ->toMediaCollection('profile-picture');
    }

    public function onUserDeletedEvent(UserDeletedEvent $event)
    {
        User::uuid($event->aggregateRootUuid())
            ->writeable()
            ->delete();
    }
}
