<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Iblock\Model\Section;
use Bitrix\Main\Data\Cache;
use Mutti\Service\Image\ImageService;

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

$imageService = new ImageService();

$arResult['DETAIL_PICTURE']['SRC'] = $imageService->getResizedWebpSrc($arResult['DETAIL_PICTURE'],['width' => 1079, 'height' => 609]);
