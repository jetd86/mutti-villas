<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (!empty($arResult)): ?>
    <nav class="aside-menu" id="asideNavigation">
        <ul class="nav aside-nav"><?
            foreach ($arResult as $item):
                if ($arParams["MAX_LEVEL"] == 1 && $item["DEPTH_LEVEL"] > 1)
                    continue; ?>
                <li class="nav-item aside-item">
                    <a href="<?= $item['LINK'] ?>" class="nav-link aside-link"><?= $item['TEXT'] ?></a>
                </li>
            <?php
            endforeach; ?>
        </ul>
    </nav><?
endif ?>
