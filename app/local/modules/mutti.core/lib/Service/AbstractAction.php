<?php

namespace Mutti\Service;

use Mutti\Traits\InstantiableTrait;

abstract class AbstractAction
{
    use InstantiableTrait;

    abstract public function execute();
}
