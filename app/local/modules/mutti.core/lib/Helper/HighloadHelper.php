<?php

namespace Mutti\Helper;

use Bitrix\Highloadblock as HL;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

class HighloadHelper
{
    /**
     * Получить ID highload-блока по NAME (символьному коду)
     *
     * @param string $entityName Символьный код HL-блока
     * @return array|null
     * @throws ArgumentException
     * @throws LoaderException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getHlBlockIdByCode(string $entityName): ?array
    {
        Loader::includeModule('highloadblock');

        $hlBlock = HL\HighloadBlockTable::getRow([
            'filter' => ['=NAME' => $entityName],
        ]);

        return !is_null($hlBlock) ? $hlBlock : null;
    }
}
