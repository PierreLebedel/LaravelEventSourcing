<?php

namespace App\Reactors;

use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

abstract class ModelReactor extends Reactor implements ShouldQueue
{
}
