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
/** @var MuttiPageAboutComponent $component */
$this->setFrameMode(true);

$component->includeComponentTemplate('hero');
$component->includeComponentTemplate('about');
$component->includeComponentTemplate('advantages');
$component->includeComponentTemplate('philosophy');
$component->includeComponentTemplate('profile');
