<?php

use App\Admin\AbstractComponent;
use Bitrix\Iblock\Iblock;
use Bitrix\Iblock\Model\Section;
use Mutti\Helper\IBlockHelper;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

class MuttiPageLocationComponent extends AbstractComponent
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
                if ($row['UF_ICON']) {
                    $row['UF_ICON'] = \CFile::GetFileArray($row['UF_ICON']);
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
        $elementClass = Iblock::wakeUp($iblockId)->getEntityDataClass();
        $cacheId = 'iblock_' . $iblockId . '_section_' . $sectionId . '_elements';
        $cachePath = '/iblock/' . $iblockId . '/section/' . $sectionId . '/';

        $this->cache->clean($cacheId, $cachePath);
        if ($this->cache->initCache($this->cacheTime, $cacheId, $cachePath)) {
            $elements = $this->cache->getVars();
        } else {
            $elements = $elementClass::query()
                ->setSelect(['ID', 'NAME', 'CODE', 'SORT'])
                ->addSelect('DISTANCE.VALUE', 'DISTANCE_VALUE')
                ->addSelect('DISTANCE_CAR.VALUE', 'DISTANCE_CAR_VALUE')
                ->addSelect('DISTANCE_AFOOT.VALUE', 'DISTANCE_AFOOT_VALUE')
                ->addFilter('ACTIVE', 'Y')
                ->addFilter('IBLOCK_ID', $iblockId)
                ->addFilter('IBLOCK_SECTION_ID', $sectionId)
                ->addOrder('SORT')
                ->exec();
            $elements->addFetchDataModifier(function ($row) {
                if ($distance = $row['DISTANCE_VALUE']) {
                    $row['PROPERTIES']['DISTANCE'] = (float)$distance;
                    unset($row['DISTANCE_VALUE']);
                }
                if ($distanceCar = $row['DISTANCE_CAR_VALUE']) {
                    $row['PROPERTIES']['DISTANCE_CAR'] = $distanceCar;
                    unset($row['DISTANCE_CAR_VALUE']);
                }
                if ($distanceAFoot = $row['DISTANCE_AFOOT_VALUE']) {
                    $row['PROPERTIES']['DISTANCE_AFOOT'] = $distanceAFoot;
                    unset($row['DISTANCE_AFOOT_VALUE']);
                }

                return $row;
            });

            $elements = $elements->fetchAll();
            $elements = array_combine(array_column($elements, 'CODE'), $elements);

            $this->cache->startDataCache();
            $this->cache->endDataCache($elements);
        }

        return $elements ?: [];
    }

    public function convertToIsoDuration(?string $timeStr = null): string
    {
        // Если значение не указано
        if ($timeStr === '—' || $timeStr === '' || $timeStr === null) {
            return '';
        }

        // Обработка приблизительного времени ("> 2 ч")
        if (str_contains($timeStr, '>')) {
            $hours = (int)trim(explode('>', $timeStr)[1]);
            return sprintf('PT%dH', $hours);
        }

        // Разбиваем на компоненты
        $parts = explode(' ', trim($timeStr));
        $hours = 0;
        $minutes = 0;

        // Обработка часов и минут
        foreach ($parts as $part) {
            if (str_ends_with($part, 'ч')) {
                $hours = (int)$part;
            } elseif (str_ends_with($part, 'мин')) {
                $minutes = (int)$part;
            }
        }

        // Формируем строку Duration
        $duration = 'PT';
        if ($hours > 0) {
            $duration .= $hours . 'H';
        }
        if ($minutes > 0) {
            $duration .= $minutes . 'M';
        }

        return $duration !== 'PT' ? $duration : '';
    }
}
