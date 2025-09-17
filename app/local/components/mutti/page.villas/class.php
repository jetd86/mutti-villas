<?php

use App\Admin\AbstractComponent;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\Model\Section;
use Mutti\Helper\IBlockHelper;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

class MuttiPageVillasComponent extends AbstractComponent
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
                if ($row['UF_PRICE']) {
                    $row['UF_PRICE'] = str_replace('|', ' ', $row['UF_PRICE']);
                }

                if ($row['PICTURE']) {
                    $row['PICTURE'] = CFile::GetFileArray($row['PICTURE']);
                }

                if ($row['UF_GALLERY']) {
                    $galleries = [];
                    foreach ($row['UF_GALLERY'] as $key => $galleryId) {
                        $galleries[$galleryId] = \CFile::GetFileArray($galleryId);
                    }

                    $row['UF_GALLERY'] = $galleries;
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

    public function getPrice($price): string
    {
        [$price, $currency] = explode(' ', $price);
        return number_format($price, 0, '.', ' ');
    }

    public function getCurrency($price): string
    {
        [$price, $currency] = explode(' ', $price);
        return $currency;
    }

    public function getSectionProperties(array $section): ?array
    {
        $properties = [];
        if ($value = $section['UF_PROP_BEDROOMS']) {
            $properties['BEDROOMS'] = $value;
        }
        if ($value = $section['UF_PROP_POOL_JACUZZI_SIZE']) {
            $properties['POOL_JACUZZI_SIZE'] = $value;
        }
        if ($value = $section['UF_PROP_GUEST_HOUSE_SIZE']) {
            $properties['GUEST_HOUSE_SIZE'] = $value;
        }
        if ($value = $section['UF_PROP_SQUARE']) {
            $properties['SQUARE'] = $value;
        }
        if ($value = $section['UF_PROP_PIECE']) {
            $properties['PIECE'] = $value;
        }
        if ($value = $section['UF_PROP_BUILDING']) {
            $properties['BUILDING'] = $value;
        }

        return !empty($properties) ? $properties : null;
    }

    public function getProperty(array $properties, string $key): ?string
    {
        if (array_key_exists($key, $properties)) {
            return $properties[$key];
        }

        return null;
    }
}
