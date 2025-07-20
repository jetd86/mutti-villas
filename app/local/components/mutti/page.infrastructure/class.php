<?php

use App\Admin\AbstractComponent;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\Model\Section;
use Mutti\Helper\IBlockHelper;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

class MuttiPageInfrastructureComponent extends AbstractComponent
{
    public function executeComponent(): void
    {
        $this
            ->loadElements()
            ->includeComponentTemplate();
    }

    private function loadElements(): self
    {
        $iblockId = IBlockHelper::getIBlockIdByCode($this->arParams['IBLOCK_CODE']);
        foreach ($this->getSections($iblockId) as $section) {
            $this->arResult['ITEMS'][$section['CODE']] = $section;
            $this->arResult['ITEMS'][$section['CODE']]['ITEMS'] = $this->getSectionElements($iblockId, $section['ID']);
        }

        return $this;
    }

    private function getSections(int $iblockId): array
    {
        $iblockClass = Section::compileEntityByIblock($iblockId);
        $cacheId = 'iblock_' . $iblockId . '_sections';
        $cachePath = '/iblock/' . $iblockId . '/section/';

        $this->cache->clean($cacheId, $cachePath);
        if ($this->cache->initCache($this->cacheTime, $cacheId, $cachePath)) {
            $sections = $this->cache->getVars();
        } else {
            $sections = $iblockClass::query()
                ->setSelect(['ID', 'SORT', 'NAME', 'CODE', 'PICTURE', 'DESCRIPTION', 'UF_*'])
                ->addFilter('=IBLOCK_ID', $iblockId)
                ->addFilter('ACTIVE', 'Y')
                ->addOrder('SORT')
                ->exec();
            $sections->addFetchDataModifier(function ($row) {
                if ($picture = $row['PICTURE']) {
                    $row['PICTURE'] = CFile::GetFileArray($picture);
                }

                return $row;
            });

            $sections = $sections->fetchAll();
            $sections = array_combine(array_column($sections, 'CODE'), $sections);

            $this->cache->startDataCache();
            $this->cache->endDataCache($sections);
        }

        return $sections ?: [];
    }

    private function getSectionElements(int $iblockId, int $sectionId): array
    {
        $cacheId = 'iblock_' . $iblockId . '_section_' . $sectionId . '_elements';
        $cachePath = '/iblock/' . $iblockId . '/section/' . $sectionId . '/';

        if ($this->cache->initCache($this->cacheTime, $cacheId, $cachePath)) {
            $elements = $this->cache->getVars();
        } else {
            $elements = ElementTable::query()
                ->setSelect(['ID', 'NAME', 'CODE', 'PREVIEW_TEXT', 'PREVIEW_TEXT_TYPE'])
                ->addFilter('ACTIVE', 'Y')
                ->addFilter('IBLOCK_ID', $iblockId)
                ->addFilter('IBLOCK_SECTION_ID', $sectionId)
                ->addOrder('SORT')
                ->exec();

            $elements = $elements->fetchAll();
            $elements = array_combine(array_column($elements, 'CODE'), $elements);

            $this->cache->startDataCache();
            $this->cache->endDataCache($elements);
        }

        return $elements ?: [];
    }
}
