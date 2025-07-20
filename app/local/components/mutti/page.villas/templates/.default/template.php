<?php

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
/** @var MuttiPageVillasComponent $component */
$this->setFrameMode(true); ?>

<div class="container">
    <div class="row"><?
        $component->includeComponentTemplate('aside');
        $component->includeComponentTemplate('content'); ?>
    </div>
</div>
<div class="container"><?
    $component->includeComponentTemplate('master-plan'); ?>
</div>
