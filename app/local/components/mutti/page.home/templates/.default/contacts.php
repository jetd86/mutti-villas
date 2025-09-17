<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Config\Option;
use Mutti\Enum\OptionBaseEnum;
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
$this->setFrameMode(true);
$arSectionResult = $arResult['ITEMS'][$component->getTemplatePage()]; ?>

<section class="section block" id="contacts">
    <div class="section-container container">
        <div class="section-row grid">
            <div class="section-grid section-grid__title">
                <h2 class="section-title"><?=$arSectionResult['NAME']?></h2>
            </div>
        </div>
        <div class="section-row grid">
            <div class="section-grid section-grid__address">
                <p><?=Option::get(ModuleEnum::MODULE_NAME->value, OptionBaseEnum::BASE_ADDRESS->value)?></p>
            </div>
            <div class="section-grid section-grid__phone">
                <ul>
                    <li>
                        <a href="tel:<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionBaseEnum::BASE_PHONE_RU->value) ?>">
                            <?= Option::get(ModuleEnum::MODULE_NAME->value, OptionBaseEnum::BASE_PHONE_RU->value) ?></a> (RU)
                    </li>
                    <li>
                        <a href="tel:<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionBaseEnum::BASE_PHONE_EN->value) ?>">
                            <?= Option::get(ModuleEnum::MODULE_NAME->value, OptionBaseEnum::BASE_PHONE_EN->value) ?></a> (EN)
                    </li>
                </ul>
            </div>
            <div class="section-grid section-grid__email">
                <p>
                    <a href="mailto:<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionBaseEnum::BASE_EMAIL->value) ?>">
                        <?= Option::get(ModuleEnum::MODULE_NAME->value, OptionBaseEnum::BASE_EMAIL->value) ?>
                    </a>
                </p>
            </div>

            <div class="section-grid section-grid__social"><?
                if ($socialIcons = $component->getSocialIcons()):?>
                    <ul class="content-social"><?

                    $socialSettings = [
                        'whatsapp' => ['phone'    => '+66801234567'],
                        'telegram' => ['username' => 'mutti_villas'],
                        'line'     => ['username' => 'muttiVillas']
                    ];

                    foreach ($socialIcons as $socialIconName):

                        if (!in_array($socialIconName, ['wechat', 'telegram', 'whatsapp', 'line'])) continue;

                        $url = '';
                        $target = '_blank';
                        $rel = 'noopener noreferrer';
                        $dataMessenger = '';

                        switch ($socialIconName) {
                            case 'whatsapp':
                                $phone = $socialSettings['whatsapp']['phone'] ?? '';
                                $url = $phone ? "https://wa.me/{$phone}" : '#';
                                break;

                            case 'telegram':
                                $username = $socialSettings['telegram']['username'] ?? '';
                                $url = $username ? "https://t.me/{$username}" : '#';
                                break;

                            case 'line':
                                $username = $socialSettings['line']['username'] ?? '';
                                $url = $username ? "https://line.me/R/ti/p/~{$username}" : '#';
                                break;

                            case 'wechat':
                                $url = '#';
                                $target = '';
                                $rel = '';
                                $dataMessenger = 'data-messenger="wechat"';
                                break;
                        }
                        ?>
                        <li class="social-item">
                        <a class="social-link"
                           href="<?=$url?>"
                           <? if ($target): ?>target="<?=$target?>"<? endif; ?>
                           <? if ($rel): ?>rel="<?=$rel?>"<? endif; ?>
                            <? if ($dataMessenger): echo $dataMessenger; endif; ?>
                           aria-label="<?=ucfirst($socialIconName)?>">
                            <i class="bi bi-<?=$socialIconName?>"></i>
                        </a>
                        </li><?
                    endforeach; ?>
                    </ul><?
                endif;?>
            </div>


            <?php /*
            <div class="section-grid section-grid__social"><?
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
 */ ?>
        </div>
    </div>
</section>
