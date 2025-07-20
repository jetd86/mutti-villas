<?php

namespace App\Services\Construction;

use App\Services\AbstractService;
use App\Services\Construction\Action\GetStorageProperties;

class ConstructionService extends AbstractService
{
    public function getStorageProperties(): GetStorageProperties
    {
        return GetStorageProperties::getInstance()
            ->execute();
    }
}
