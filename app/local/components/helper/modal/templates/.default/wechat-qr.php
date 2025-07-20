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
/** @var HelperModalComponent $component */
$this->setFrameMode(true); ?>

<template id="wechat-qr">
    <div class="text-center">
        <p>Отсканируйте QR-код для связи в WeChat:</p>
    </div>
</template>
