<?php

namespace App\Aggregates;

use App\Contracts\ModelAggregateRootContract;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

abstract class ModelAggregateRoot extends AggregateRoot implements ModelAggregateRootContract
{
}
