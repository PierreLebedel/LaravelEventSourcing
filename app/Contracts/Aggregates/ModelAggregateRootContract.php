<?php

namespace App\Contracts\Aggregates;

interface ModelAggregateRootContract
{
    public function create(array $attributes): self;

    public function update(array $attributes): self;

    public function delete(): self;
}
