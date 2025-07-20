<?php

namespace Mutti\Traits;

trait InstantiableTrait
{
    public static function getInstance(): static
    {
        return new static();
    }
}
