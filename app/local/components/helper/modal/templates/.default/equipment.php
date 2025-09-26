<?php

use Bitrix\Main\Localization\Loc;

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
/** @var HelperModalComponent $component */
$this->setFrameMode(true); ?>

<template id="content-equipment">
    <h3><?=Loc::getMessage('EQUIPMENT_ENABLE')?></h3>
    <ul class="modal-list equipment-list"><?
        $elements = $component->getPropertiesData();
        foreach ($elements ?: [] as $equipment) {
            if (!$equipment['ADDITIONAL']) { ?>
                <li class="modal-item equipment-item">
                    <span class="item-icon" style="background-image: url(<?=$equipment['PREVIEW_PICTURE']['SRC']?>)"></span>
                    <span class="item-title"><?=$equipment['NAME']?></span>
                </li>
            <? }
        } ?>
    </ul>

    <h3><?= Loc::getMessage('EQUIPMENT_TITLE')?></h3>
    <p><?= Loc::getMessage('EQUIPMENT_DESCRIPTION')?></p>
    <ul class="modal-list equipment-list"><?
        $elements = $component->getPropertiesData();
        foreach ($elements ?: [] as $equipment) {
            if ($equipment['ADDITIONAL']) { ?>
                <li class="modal-item equipment-item">
                    <span class="item-icon" style="background-image: url(<?=$equipment['PREVIEW_PICTURE']['SRC']?>)"></span>
                    <span class="item-title"><?=$equipment['NAME']?></span>
                </li>
            <? }
        } ?>
    </ul>
</template>
