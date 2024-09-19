<?php

namespace App\Aggregates;

use App\Contracts\Aggregates\ModelAggregateRootContract;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

abstract class ModelAggregateRoot extends AggregateRoot implements ModelAggregateRootContract
{
}
