<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
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
/** @var MuttiFooterContactsComponent $component */
$this->setFrameMode(true); ?>

<div class="footer-block footer-contacts">
    <div class="footer-wrapper"><?
        if ($address = $component->getAddress()): ?>
            <div class="footer-address">
                <p><?= $address ?></p>
            </div><?
        endif;
        if ($component->getPhone('OFFICE_PHONE_RU') || $component->getPhone('OFFICE_PHONE_EN')): ?>
            <ul class="footer-phone"><?
                if ($component->getPhone('OFFICE_PHONE_RU')): ?>
                    <li class="phone-item">
                        <a class="phone-link" href="tel:<?=$component->getPhone('OFFICE_PHONE_RU', true)?>">
                            <?= $component->getPhone('OFFICE_PHONE_RU') ?> (RU)</a>
                    </li><?
                endif;
                if ($component->getPhone('OFFICE_PHONE_EN')): ?>
                    <li class="phone-item">
                        <a class="phone-link" href="tel:<?=$component->getPhone('OFFICE_PHONE_EN', true)?>">
                            <?= $component->getPhone('OFFICE_PHONE_EN') ?> (EN)</a>
                    </li><?
                endif; ?>
            </ul><?
        endif;
        if ($email = $component->getEmail()): ?>
            <ul class="footer-email">
                <li class="email-item">
                    <a class="email-link" href="mailto:<?= $email ?>"><?= $email ?></a>
                </li>
            </ul><?
        endif; ?>
	<ul class="footer-email">
       <li>
           <a href="/policy/"><?=Loc::getMessage('POLICY')?></a>
      </li>
    </ul>
	<ul class="footer-email">
       <li>
           <a href="/cookies-policy/"><?=Loc::getMessage('COOKIES')?></a>
      </li>
    </ul>
	<ul class="footer-email">
       <li>
           <a href="/terms-and-conditions/"><?=Loc::getMessage('TERMS_AND_SERVICE')?></a>
      </li>
    </ul>
    </div>

    <?php
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
    /** @var MuttiFooterContactsComponent $component */

    $this->setFrameMode(true);

    if ($socialIcons = $component->getSocialIcons()): ?>
        <div class="footer-wrapper">
            <ul class="footer-social"><?php

                $socialSettings = [
                    'whatsapp' => ['phone'    => $arResult['MUTTI_CORE']['global_social_whatsapp']['VALUE']],
                    'telegram' => ['username' => $arResult['MUTTI_CORE']['global_social_telegram']['VALUE']],
                    'line'     => ['username' => $arResult['MUTTI_CORE']['global_social_line']['VALUE']]
                ];



                foreach ($socialIcons as $socialIconName):
                    $url = '';
                    $target = '_blank';
                    $rel = 'noopener noreferrer';
                    $dataMessenger = '';

                    switch ($socialIconName) {
                        case 'whatsapp':
                            $phone = $socialSettings['whatsapp']['phone'] ?? '';
                            $url = $socialSettings['whatsapp']['phone'] ?? '#';
                            break;

                        case 'telegram':
                            $username = $socialSettings['telegram']['username'] ?? '';
                            $url = $username ? $socialSettings['telegram']['username'] : '#';
                            break;

                        case 'line':
                            $username = $socialSettings['line']['username'] ?? '';
                            $url =$socialSettings['line']['username'] ?? '#';
                            break;

                        case 'youtube':
                            $url = 'https://www.youtube.com/@Mutti-p7z';
                            break;

                        case 'facebook':
                            $url = 'https://www.facebook.com/Mutti.Villas';
                            break;

                        case 'instagram':
                            $url = 'https://www.instagram.com/mutti.villas';
                            break;

                        case 'wechat':
                            $url = '#';
                            $target = '';
                            $rel = '';
                            $dataMessenger = 'data-messenger="wechat"';
                            break;

                        default:
                            $url = '#';
                            break;
                    }
                    ?>
                    <li class="social-item">
                        <a class="social-link"
                           href="<?=$url?>"
                           <?php if ($target): ?>target="<?=$target?>"<?php endif; ?>
                           <?php if ($rel): ?>rel="<?=$rel?>"<?php endif; ?>
                            <?php if ($dataMessenger): echo $dataMessenger; endif; ?>
                           aria-label="<?=ucfirst($socialIconName)?>">
                            <i class="bi bi-<?=$socialIconName?>"></i>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>



    <? /*
    if ($socialIcons = $component->getSocialIcons()): ?>
        <div class="footer-wrapper">
            <ul class="footer-social"><?
                foreach ($socialIcons as $socialIconName): ?>
                    <li class="social-item">
                        <a class="social-link" data-messenger="<?=$socialIconName?>">
                            <i class="bi bi-<?=$socialIconName?>"></i>
                        </a>
                    </li>
                <?endforeach; ?>
            </ul>
        </div><?
    endif; */?>

</div>
