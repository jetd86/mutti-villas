<?php

use App\Admin\AbstractComponent;
use App\Enum\IBlockCode;
use Mutti\Helper\IBlockHelper;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

class MuttiAboutPhilosophyComponent extends AbstractComponent
{
    public function executeComponent(): void
    {
        $this->loadAdvantages();
        $this->includeComponentTemplate();
    }

    private function loadAdvantages(): void
    {
        $iblockId = IBlockHelper::getIBlockIdByCode(IBlockCode::ABOUT_ADVANTAGES->value);
        $iblockClass = \Bitrix\Iblock\Iblock::wakeUp($iblockId)->getEntityDataClass();
        $iblockElements = $iblockClass::query()
            ->addSelect('NAME')
            ->addSelect('PREVIEW_TEXT')
            ->addOrder('SORT')
            ->exec();

        if ($arResult = $iblockElements->fetchAll()) {
            $this->arResult['ITEMS'] = $arResult;
        }
    }
}
