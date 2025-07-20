<?php

namespace App\Services\Villas\Action;

use App\Enum\IBlockCode;
use App\Services\AbstractAction;
use Bitrix\Main\Entity\DataManager;
use CFile;

class GetStorageProperties extends AbstractAction
{
    public function __construct()
    {
        parent::__construct();
        $this->iblockCode = IBlockCode::STORAGE_EQUIPMENT->value;
    }

    public function execute(): static
    {
        return $this
            ->getElements();
    }

    protected function getElements(): static
    {
        $iblockId = $this->getIblockId();
        /** @var DataManager $iblockClass */
        $iblockClass = $this->getIblockClass($iblockId);
        $elements = $iblockClass::getList([
            'select' => ['ID', 'NAME', 'CODE', 'PREVIEW_*', 'ADDITIONAL_VALUE' => 'ADDITIONAL.ITEM.XML_ID'],
            'filter' => ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
            'order' => ['SORT', 'ID'],
        ]);
        $elements->addFetchDataModifier(function ($row) {
            if ($row['ID'])
                $row['ID'] = (int)$row['ID'];

            if ($row['PREVIEW_PICTURE'])
                $row['PREVIEW_PICTURE'] = CFile::GetFileArray($row['PREVIEW_PICTURE']);

            $row['ADDITIONAL'] = false;
            if ($row['ADDITIONAL_VALUE']) {
                $row['ADDITIONAL'] = $row['ADDITIONAL_VALUE'] === 'Y';
            }

            unset($row['ADDITIONAL_VALUE']);

            return $row;
        });
        $this->result = $elements->fetchAll();

        return $this;
    }
}
