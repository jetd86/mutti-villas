<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use App\Enum\IBlockCode;
use App\Helper\IBlockHelper;

global $APPLICATION;
$iblockId = IBlockHelper::getIBlockIdByCode(IBlockCode::PAGE_MUTTI_GUIDE->value);

$aMenuLinksExt = $APPLICATION->IncludeComponent("bitrix:menu.sections", "", [
    "IS_SEF" => "Y",
    "SEF_BASE_URL" => "/mutti-guide/",
    "SECTION_PAGE_URL" => "#SECTION_CODE#/",
    "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/",
    "IBLOCK_TYPE" => "content",
    "IBLOCK_ID" => $iblockId,
    "DEPTH_LEVEL" => "1",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000"
], false);
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
