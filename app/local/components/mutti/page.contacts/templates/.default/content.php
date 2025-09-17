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
/** @var MuttiPageContactsComponent $component */
$this->setFrameMode(true); ?>

<section class="section content-page" id="content-page">
    <div class="content-container container"><?
            if ($address = $component->getAddress()): ?>
                <div class="content-address">
                    <p><?= $address ?></p>
                </div><?
            endif;
            if ($component->getPhone('OFFICE_PHONE_RU') || $component->getPhone('OFFICE_PHONE_EN')): ?>
                <ul class="content-phone"><?
                if ($component->getPhone('OFFICE_PHONE_RU')): ?>
                    <li class="phone-item">
                        <a class="phone-link" href="tel:<?=$component->getPhone('OFFICE_PHONE_RU', true)?>">
                            <?= $component->getPhone('OFFICE_PHONE_RU') ?> (RU)
                        </a>
                    </li><?
                endif;
                if ($component->getPhone('OFFICE_PHONE_EN')): ?>
                    <li class="phone-item">
                        <a class="phone-link" href="tel:<?=$component->getPhone('OFFICE_PHONE_EN', true)?>">
                            <?= $component->getPhone('OFFICE_PHONE_EN') ?> (EN)
                        </a>
                    </li><?
                endif; ?>
                </ul><?
            endif;
            if ($email = $component->getEmail()): ?>
                <ul class="content-email">
                    <li class="email-item">
                        <a class="email-link" href="mailto:<?= $email ?>">
                            <?= $email ?>
                        </a>
                    </li>
                </ul><?
            endif;
            if ($socialIcons = $component->getSocialIcons()):?>
                <ul class="content-social"><?
                foreach ($socialIcons as $socialIconName): ?>
                    <li class="social-item">
                        <span class="social-link" data-messenger="<?=$socialIconName?>">
                            <i class="bi bi-<?=$socialIconName?>"></i>
                        </span>
                    </li><?
                endforeach; ?>
                </ul><?
            endif;?>
        </div>
</section>
