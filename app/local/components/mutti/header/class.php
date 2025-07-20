<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use App\Admin\AbstractComponent;

class MuttiHeaderComponent extends AbstractComponent
{
    public function executeComponent(): void
    {
        $this->includeComponentTemplate();
    }

    public function getSocialIcons(): ?array
    {
        if (array_key_exists('SOCIAL_ICONS', $this->arParams) && is_array($this->arParams['SOCIAL_ICONS'])) {
            return $this->arParams['SOCIAL_ICONS'];
        }

        return null;
    }

}
