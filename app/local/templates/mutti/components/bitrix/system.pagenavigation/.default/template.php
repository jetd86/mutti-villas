<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

/** @var array $arParams */
/** @var array $arResult */
$this->setFrameMode(true);

// ссылка на первую страницу
$firstPageUrl = $arResult['sUrlPath'];
if (!empty($arResult['NavQueryString'])) {
    $firstPageUrl = $firstPageUrl . '?' . $arResult['NavQueryString'];
}
// ссылка на последнюю страницу
$lastPageUrl = !empty($arResult['NavQueryString'])
    ? $arResult['sUrlPath'] . '?' . $arResult['NavQueryString'] . '&amp;PAGEN_' . $arResult['NavNum'] . '=' . $arResult['NavPageCount']
    : $arResult['sUrlPath'] . '?PAGEN_' . $arResult['NavNum'] . '=' . $arResult['NavPageCount']
?>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="<?= $firstPageUrl ?>">
                <i class="bi bi-chevron-compact-left"></i>
            </a>
        </li><?
        for ($i = $arResult['nStartPage']; $i <= $arResult['nEndPage']; $i++):
            $pageUrl = $arResult['sUrlPath'];
            $pageUrl = !empty($arResult['NavQueryString'])
                ? $pageUrl . '?' . $arResult['NavQueryString'] . '&amp;PAGEN_' . $arResult['NavNum'] . '=' . $i
                : $pageUrl . '?PAGEN_' . $arResult['NavNum'] . '=' . $i;
            if ($arResult['NavPageNomer'] == $i): /* если это текущая страница */ ?>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="<?= $pageUrl; ?>"><?= $i; ?></a>
                </li><?
            else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pageUrl; ?>"><?= $i; ?></a>
                </li><?
            endif;
        endfor; ?>
        <li class="page-item">
            <a class="page-link" href="<?= $lastPageUrl ?>">
                <i class="bi bi-chevron-compact-right"></i>
            </a>
        </li>
    </ul>
</nav>
