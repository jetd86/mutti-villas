<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use App\Admin\AbstractComponent;

class MuttiHeaderPageComponent extends AbstractComponent
{
    public function executeComponent(): void
    {
        $this->includeComponentTemplate();
    }
}
