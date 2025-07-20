<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use App\Helper\IBlockHelper;
use Bitrix\Iblock\Iblock;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Data\Cache;

/**
 * @var array $arResult
 * @var array $arParams
 * @var CBitrixMenuComponent $component
 */

$this->setFrameMode(true);

$arSections = [];
$iblockId = IBlockHelper::getIBlockIdByCode($arParams['IBLOCK_CODE']);
$iblockClass = Iblock::wakeUp($iblockId)->getEntityDataClass();
$cacheId = 'iblock_' . $iblockId . '_sections';
$cachePath = '/iblock/' . $iblockId . '/section/';
$cacheTime = 3600;
$cache = Cache::createInstance();

if ($cache->initCache($cacheTime, $cacheId, $cachePath)) {
    $sections = $cache->getVars();
} else {
    $sections = SectionTable::query()
        ->setSelect(['ID', 'SORT', 'NAME', 'CODE'])
        ->addFilter('=IBLOCK_ID', $iblockId)
        ->addFilter('ACTIVE', 'Y')
        ->addOrder('SORT')
        ->exec();
    $sections = $sections->fetchAll();

    $cache->startDataCache();
    $cache->endDataCache($sections);
}

foreach ($sections as $section) {
    $arSections[$section['CODE']] = [
        'TEXT' => $section['NAME'],
        'LINK' => $section['CODE'],
        'SELECTED' => false,
        'DEPTH_LEVEL' => 1,
        'PARAMS' => [
            'SECTION_ID' => $section['ID']
        ]
    ];
}

$arResult = [
    'TEXT' => 'Навигация по разделам',
    'LINK' => '',
    'SELECTED' => false,
    'PERMISSION' => 'X',
    'DEPTH_LEVEL' => 0,
    'IS_PARENT' => true,
    'ITEMS' => array_values($arSections)
];
?>
<nav class="aside-menu" id="asideNavigation">
    <ul class="nav aside-nav">
        <?php foreach ($arResult['ITEMS'] as $item): ?>
            <li class="nav-item">
                <a href="<?= $item['LINK'] ?>"  class="nav-link js-anchor-link"
                   data-section="<?= $item['PARAMS']['SECTION_ID'] ?>"><?= $item['TEXT'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
