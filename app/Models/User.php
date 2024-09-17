<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Aggregates\UserAggregate;
use App\Contracts\ModelHasAggregateContract;
use App\Traits\ModelHasAggregate;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Spatie\EventSourcing\Projections\Projection;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Projection implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    ModelHasAggregateContract,
    HasMedia
{
    use Authenticatable;
    use Authorizable;
    use CanResetPassword;
    use HasFactory;
    use HasUuids;
    use InteractsWithMedia;
    use ModelHasAggregate;
    use MustVerifyEmail;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public static function getModelAggregateRoot(): UserAggregate
    {
        return new UserAggregate();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile-picture')
            ->singleFile()
            ->useFallbackUrl('/img/user-profile-picture.jpg')
            ->useFallbackPath(public_path('/img/user-profile-picture.jpg'))
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('small')
                    ->fit(Fit::Crop, 64, 64)
                    ->nonQueued();

                $this->addMediaConversion('avatar')
                    ->fit(Fit::Crop, 256, 256)
                    ->nonQueued();
            });
    }
}
