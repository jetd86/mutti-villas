<?php

namespace App\Services\Location\Action;

use Bitrix\Iblock\Iblock;
use Bitrix\Main\ORM\Query\Result;
use Mutti\Helper\IBlockHelper;

/**
 * @deprecated
 */
class GetSectionElements extends AbstractAction
{
    private int $sectionId;
    private ?string $elementClass = null;

    public function execute()
    {
        return $this
            ->getSectionElementsClass()
            ->getElements();
    }

    private function getElements(): array
    {
        /** @var Result $dbElements */
        $dbElements = $this->elementClass::query()
            ->setSelect(['ID', 'NAME', 'CODE', 'SORT'])
            ->addSelect('DISTANCE.VALUE', 'DISTANCE_VALUE')
            ->addSelect('DISTANCE_CAR.VALUE', 'DISTANCE_CAR_VALUE')
            ->addSelect('DISTANCE_AFOOT.VALUE', 'DISTANCE_AFOOT_VALUE')
            ->addFilter('IBLOCK_SECTION_ID', $this->sectionId)
            ->addFilter('ACTIVE', 'Y')
            ->addOrder('SORT')
            ->exec();

        $dbElements->addFetchDataModifier(function ($row) {
            $row['DISTANCE_VALUE'] = (float)$row['DISTANCE_VALUE'];
            return $row;
        });

        $elements = [];
        while ($element = $dbElements->fetch()) {
            $elements[$element['CODE']] = $element;
            $elements[$element['CODE']]['PROPERTIES'] = [
                'DISTANCE' => $element['DISTANCE_VALUE'],
                'DISTANCE_CAR' => $element['DISTANCE_CAR_VALUE'],
                'DISTANCE_AFOOT' => $element['DISTANCE_AFOOT_VALUE']
            ];
        }

        return $elements;
    }

    private function getSectionElementsClass(): static
    {
        $iblockId = IBlockHelper::getIBlockIdByCode($this->iblockCode);
        $elementClass = Iblock::wakeUp($iblockId)->getEntityDataClass();
        if (!is_null($elementClass)) {
            $this->elementClass = $elementClass;
        }

        return $this;
    }

    public function setSectionId(int $sectionId): static
    {
        $this->sectionId = $sectionId;
        return $this;
    }
}
