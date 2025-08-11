<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Config\Option;
use Mutti\Enum\OptionHomeEnum;
use Mutti\Enum\ModuleEnum;

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
/** @var MuttiPageHomeComponent $component */
$this->setFrameMode(true); ?>

<section class="section hero" id="hero">
    <div class="section-image"></div>
    <div class="section-container container">
        <div class="section-wrapper">
            <div class="section-title">
                <h1><?= Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_HERO_TITLE->value) ?></h1>
                <p><?= Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_HERO_DESCRIPTION->value) ?></p>
            </div>

            <?php
            $host = $_SERVER['HTTP_HOST'] ?? '';

            $host = strtolower($host);
            $host = preg_replace('/:\d+$/', '', $host);

            $tld = '';
            if (preg_match('/\.([^.]+)$/', $host, $matches)) {
                $tld = $matches[1];
            }

            if ($tld === 'com') { ?>
                <div class="section-title__image-container">
                    <img src="/public/home-main-5-stars-en.png"
                         srcset="/public/home-main-5-stars-en.png 1x,
               /public/home-main-5-stars-en@2x.png 2x,
               /public/home-main-5-stars-en@3x.png 3x"
                         sizes="160px"
                         alt="5 stars" width="160"/>

                    <img src="/public/home-main-mount-en.png"
                         srcset="/public/home-main-mount-en.png 1x,
               /public/home-main-mount-en@2x.png 2x,
               /public/home-main-mount-en@3x.png 3x"
                         sizes="160px"
                         alt="Mountain" width="160"/>

                    <img src="/public/home-main-sea-en.png"
                         srcset="/public/home-main-sea-en.png 1x,
               /public/home-main-sea-en@2x.png 2x,
               /public/home-main-sea-en@3x.png 3x"
                         sizes="160px"
                         alt="Sea" width="160"/>
                </div>
            <?php } else { ?>
                <div class="section-title__image-container">
                    <img src="/public/home-main-5-stars.png"
                         srcset="/public/home-main-5-stars.png 1x,
               /public/home-main-5-stars@2x.png 2x,
               /public/home-main-5-stars@3x.png 3x"
                         sizes="160px"
                         alt="5 stars" width="160"/>

                    <img src="/public/home-main-mount.png"
                         srcset="/public/home-main-mount.png 1x,
               /public/home-main-mount@2x.png 2x,
               /public/home-main-mount@3x.png 3x"
                         sizes="160px"
                         alt="Mountain" width="160"/>

                    <img src="/public/home-main-sea.png"
                         srcset="/public/home-main-sea.png 1x,
               /public/home-main-sea@2x.png 2x,
               /public/home-main-sea@3x.png 3x"
                         sizes="160px"
                         alt="Sea" width="160"/>
                </div>
            <?php } ?>

        </div>
    </div>
</section>
