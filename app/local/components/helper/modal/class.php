<?php

use App\Admin\AbstractComponent;
use App\Services\Villas\VillasService;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

class HelperModalComponent extends AbstractComponent
{
    public function executeComponent(): void
    {
        $this->includeComponentTemplate();
    }

    public function getPropertiesData(): array
    {
        return VillasService::getInstance()->getStorageProperties()->getResult();
    }
}
