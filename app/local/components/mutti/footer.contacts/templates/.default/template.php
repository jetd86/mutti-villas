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
    </div><?
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
    endif; ?>
</div>
