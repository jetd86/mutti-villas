<?php

use Mutti\Enum\OptionLocationEnum;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die();

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
$this->setFrameMode(true);?>

<section class="section content-page" id="content-page">
    <div class="container">
        <?=$component::getModuleOption(OptionLocationEnum::LOCATION_FIELD_CUSTOM_TEXT_DESCRIPTION);?>
    </div>
</section>

