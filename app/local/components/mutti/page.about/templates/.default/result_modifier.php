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

$arResult['ITEMS']['about']['PICTURE']['SRC'] = $imageService->getResizedWebpSrc($arResult['ITEMS']['about']['PICTURE'],['width' => 1200, 'height' => 467]);
$arResult['ITEMS']['philosophy']['PICTURE']['SRC'] = $imageService->getResizedWebpSrc($arResult['ITEMS']['philosophy']['PICTURE'],['width' => 1296, 'height' => 729]);
$arResult['ITEMS']['profile']['PICTURE']['SRC'] = $imageService->getResizedWebpSrc($arResult['ITEMS']['profile']['PICTURE'],['width' => 416, 'height' => 388]);

