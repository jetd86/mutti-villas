<?php

namespace App\Services\HomePage;

use App\Services\AbstractService;
use App\Services\HomePage\Action\GetAction;

class HomePageService extends AbstractService
{

    public function getIBlockData(): GetAction
    {
        return GetAction::getInstance()
            ->execute();
    }
}
