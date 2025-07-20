<?php

use App\Admin\AbstractComponent;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

class HelperPageTitleComponent extends AbstractComponent
{
    public function onPrepareComponentParams($arParams): array
    {
        $arParams['TITLE'] = trim($arParams['TITLE'] ?? '');
        $arParams['SUBTITLE'] = trim($arParams['SUBTITLE'] ?? '');
        $arParams['HEADER_BUTTON'] = trim($arParams['HEADER_BUTTON'] ?? '');
        $arParams['HEADER_BUTTON_TEXT'] = trim($arParams['HEADER_BUTTON_TEXT'] ?? '');
        $arParams['HEADER_BUTTON_ICON'] = trim($arParams['HEADER_BUTTON_ICON'] ?? '');

        return $arParams;
    }

    public function executeComponent(): void
    {
        global $APPLICATION;

        $this->arResult['TITLE'] = $this->arParams['TITLE'] ?: $APPLICATION->GetTitle() ?: '';
        $this->arResult['SUBTITLE'] = $this->arParams['SUBTITLE'] ?: $APPLICATION->GetPageProperty('subtitle');

        $this->includeComponentTemplate();
    }

    public function viewButton(): bool
    {
        return $this->arParams['HEADER_BUTTON'] && $this->arParams['HEADER_BUTTON_TEXT'];
    }
}
