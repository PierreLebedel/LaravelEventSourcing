<?php

namespace App\Aggregates;

use App\StorableEvents\User\UserCreatedEvent;
use App\StorableEvents\User\UserDeletedEvent;
use App\StorableEvents\User\UserProfilePictureUpdatedEvent;
use App\StorableEvents\User\UserUpdatedEvent;

class UserAggregate extends ModelAggregateRoot
{
    public function register(array $attributes): self
    {
        $this->recordThat(new UserCreatedEvent($attributes));

        return $this;
    }

    public function create(array $attributes): self
    {
        $this->recordThat(new UserCreatedEvent($attributes));

        return $this;
    }

    public function update(array $attributes): self
    {
        $this->recordThat(new UserUpdatedEvent($attributes));

        return $this;
    }

    public function updateProfilePicture(string $path, string $disk = 'local'): self
    {
        $this->recordThat(new UserProfilePictureUpdatedEvent($path, $disk));

        return $this;
    }

    public function delete(): self
    {
        $this->recordThat(new UserDeletedEvent());

        return $this;
    }
}
