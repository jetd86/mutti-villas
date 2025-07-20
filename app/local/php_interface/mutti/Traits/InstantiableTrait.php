<?php

namespace App\Traits;

trait InstantiableTrait
{
    public static function getInstance(): static
    {
        return new static();
    }
}
