<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

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
$this->setFrameMode(true); ?>

<section class="section map" id="map-google">
    <div class="container">
        <h2><?= Loc::getMessage('MAP_GOOGLE_HEADER_TITLE') ?></h2>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.4665459664457!2d98.32846767483194!3d7.846140592175288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30503784627377e1%3A0x871a8f7968e205ca!2sMutti%20Family%20Villas!5e0!3m2!1sen!2sru!4v1748093296795!5m2!1sen!2sru"
            style="height: 635px; width: 100%; border: 0;" loading="lazy"></iframe>
</section>
