<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Iblock\Model\Section;
use Bitrix\Main\Data\Cache;

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$arSection = [];
$cache = Cache::createInstance();
foreach ($arResult["ITEMS"] as $key => $arItem):
    $iblockClass = Section::compileEntityByIblock($arItem['IBLOCK_ID']);
    $section = $iblockClass::getRowById($arItem['IBLOCK_SECTION_ID']);

    $arResult["ITEMS"][$key]['SECTION'] = $section;
    $arResult["ITEMS"][$key]['IBLOCK_SECTION_NAME'] = $section['NAME'];
    $arResult["ITEMS"][$key]['IBLOCK_SECTION_LINK'] = $arItem['LIST_PAGE_URL'] . $section['CODE'] . '/';
endforeach;
