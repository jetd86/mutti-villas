<?php

namespace App\Services\Villas;

use App\Services\AbstractService;
use App\Services\Villas\Action\GetAction;
use App\Services\Villas\Action\GetStorageProperties;

class VillasService extends AbstractService
{
    public function getIBlockData(): GetAction
    {
        return GetAction::getInstance()
            ->execute();
    }

    public function getStorageProperties(): GetStorageProperties
    {
        return GetStorageProperties::getInstance()
            ->execute();
    }
}
