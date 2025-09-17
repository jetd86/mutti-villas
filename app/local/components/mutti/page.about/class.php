<?php

use App\Admin\AbstractComponent;
use App\Services\About\AboutPageService;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

class MuttiPageAboutComponent extends AbstractComponent
{
    public function executeComponent(): void
    {
        $this->arResult['ITEMS'] = [];

        $pageData = AboutPageService::getInstance()->getIBlockData();
        if (!$pageData->getErrors()) {
            $this->arResult['ITEMS'] = $pageData->getResult();
        }

        $this->includeComponentTemplate();
    }

    public function getAboutParams(): array
    {
        $arParams['STATS'] = [];
        foreach ($this->arParams['STAT_TEXT'] as $key => $value) {
            if (empty($value)) {
                continue;
            }

            $arParams['STATS'][$key] = [
                'NAME' => $this->arParams['STAT_TEXT'][$key],
                'VALUE' => $this->arParams['STAT_NUMBERS'][$key],
            ];
        }

        return $arParams;
    }
}
