<?php

namespace App\Concerns\Models;

use App\Aggregates\ModelAggregateRoot;
use Illuminate\Support\Str;

trait HasAggregate
{
    public static function uuid(string $uuid): ?static
    {
        return static::where('uuid', $uuid)->first();
    }

    public static function makeAggregate(?string $uuid = null): ModelAggregateRoot
    {
        if (!$uuid) {
            $uuid = Str::uuid()->toString();
        }

        return self::getModelAggregateRoot()::retrieve($uuid);
    }

    public function getAggregate(): ModelAggregateRoot
    {
        return self::getModelAggregateRoot()::retrieve($this->uuid);
    }
}
