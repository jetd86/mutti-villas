<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die();

use Bitrix\Main\Context;
use Bitrix\Main\Localization\Loc;

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
/** @var MuttiPageLocationComponent $component */
$this->setFrameMode(true);
$culture = Context::getCurrent()->getCulture();?>

<section class="section map" id="map" data-lang="<?=$culture->getCode()?>">
    <div class="container">
        <h2><?= Loc::getMessage('MAP_HEADER_TITLE')?></h2>
    </div>
    <iframe src="https://www.google.com/maps/d/embed?mid=1GwybBaHms4a31Y4I-bT8fxcXL6riWmE&ehbc=2E312F"
            style="height: 635px; width: 100%; border: 0;" loading="lazy"></iframe>
</section>
