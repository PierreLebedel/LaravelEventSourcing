<?php

namespace App\Contracts\Models;

use App\Aggregates\ModelAggregateRoot;

interface HasAggregateContract
{
    public static function uuid(string $uuid): ?static;

    public static function getModelAggregateRoot(): ModelAggregateRoot;

    public static function makeAggregate(?string $uuid = null): ModelAggregateRoot;

    public function getAggregate(): ModelAggregateRoot;
}
