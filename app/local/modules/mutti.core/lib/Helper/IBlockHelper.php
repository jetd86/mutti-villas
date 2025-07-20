<?php

namespace Mutti\Helper;

use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\Model\Section;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Loader;

class IBlockHelper
{
    public static function getIBlockIdByCode(string $code, string $type = ''): ?int
    {
        Loader::IncludeModule("iblock");

        $filter = [];
        $filter['CODE'] = $code;
        if ($type) {
            $filter['IBLOCK_TYPE_ID'] = $type;
        }

        $row = IblockTable::getRow(compact('filter'));

        return !is_null($row) ? (int)$row['ID'] : null;
    }

    public static function getSectionTableByCode(string $code): string|SectionTable|null
    {
        $iblockId = IBlockHelper::getIBlockIdByCode($code);
        return Section::compileEntityByIblock($iblockId);
    }
}
