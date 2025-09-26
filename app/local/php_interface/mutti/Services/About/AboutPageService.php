<?php

namespace App\Services\About;

use App\Services\About\Action\GetAction;
use App\Services\AbstractService;

class AboutPageService extends AbstractService
{

    public function getIBlockData(): GetAction
    {
        return GetAction::getInstance()
            ->execute();
    }
}
