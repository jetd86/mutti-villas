<?php

namespace App\Services\Location\Action;

use Bitrix\Iblock\Model\Section;
use Mutti\Helper\IBlockHelper;

class GetSectionAction extends AbstractAction
{
    private ?string $sectionClass = null;

    public function execute()
    {
        return $this
            ->getSectionClass()
            ->getIblockSections();
    }

    private function getIblockSections()
    {
        /** @var \Bitrix\Main\ORM\Query\Result $sections */
        $sections = $this->sectionClass::query()
            ->setSelect(['ID', 'NAME', 'CODE', 'SORT'])
            ->addFilter('ACTIVE', 'Y')
            ->addOrder('SORT')
            ->exec();

        $sections->addFetchDataModifier(function($row) {
            $row['ID'] = (int)$row['ID'];
            $row['SORT'] = (int)$row['SORT'];

            return $row;
        });

        return $sections->fetchAll();
    }

    private function getSectionClass(): self
    {
        $iblockId = IBlockHelper::getIBlockIdByCode($this->iblockCode);
        $sectionClass = Section::compileEntityByIblock($iblockId);
        if (!is_null($sectionClass)) {
            $this->sectionClass = $sectionClass;
        }

        return $this;
    }
}
