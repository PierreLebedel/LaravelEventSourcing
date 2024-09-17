<?php

namespace App\Projectors;

use Spatie\EventSourcing\EventHandlers\Projectors\Projector;
use Spatie\EventSourcing\Projections\Projection;

abstract class ModelProjector extends Projector
{
    abstract public function getModelProjection() :Projection;

    public function onStartingEventReplay()
    {
        $this->getModelProjection()::truncate();
    }
}
