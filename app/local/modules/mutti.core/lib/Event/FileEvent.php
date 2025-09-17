<?php

namespace Mutti\Event;

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\Loader;
use Bitrix\Main\Type\DateTime;
use CFile;

class FileEvent
{
    protected const HLBLOCK_ID = 4;
    protected static array $allowedTypes = ['image/jpeg', 'image/png'];

    public static function OnAfterFileSave(array $arFile): void
    {
        if (!in_array($arFile['CONTENT_TYPE'], self::$allowedTypes)) {
            return;
        }

        if (intval($arFile['HEIGHT']) === 0 && intval($arFile['WIDTH']) === 0) {
            return;
        }

        $absolutePath = CFile::GetFileSRC($arFile);
        $absolutePath = $_SERVER['DOCUMENT_ROOT'] . $absolutePath;
        if (!file_exists($absolutePath)) {
            return;
        }

        $webpPath = preg_replace('/\.(jpe?g|png)$/i', '.webp', $absolutePath);
        exec("cwebp -q 80 {$absolutePath} -o {$webpPath}");

        if (!file_exists($webpPath)) {
            return;
        }

        // Сохраняем WebP в файловую систему и Bitrix
        $webpFileArray = CFile::MakeFileArray($webpPath);
        $webpFileArray['MODULE_ID'] = 'mutti.core';
        $webpFileArray['DESCRIPTION'] = 'optimization';
        $webpFileArray['HANDLER_ID'] = 'cwebp';
        $webpFileArray['EXTERNAL_ID'] = md5($webpPath);

        $webpFileId = CFile::SaveFile($webpFileArray, 'upload/webp');
        if (!$webpFileId) {
            return;
        }

        self::logConversion([
            'UF_FILE_ID' => (int)$arFile['ID'],
            'UF_WEBP_ID' => (int)$webpFileId,
        ]);
    }

    protected static function logConversion(array $data): void
    {
        if (!Loader::includeModule('highloadblock')) {
            return;
        }

        $hlBlock = HighloadBlockTable::getById(self::HLBLOCK_ID)->fetch();
        if (!$hlBlock) {
            return;
        }

        $entity = HighloadBlockTable::compileEntity($hlBlock);
        $entityClass = $entity->getDataClass();
        $now = new DateTime();

        $existing = $entityClass::getList([
            'filter' => ['UF_FILE_ID' => $data['UF_FILE_ID']],
            'select' => ['ID'],
            'limit' => 1,
        ])->fetch();

        if ($existing) {
            $entityClass::update($existing['ID'], [
                'UF_WEBP_ID' => $data['UF_WEBP_ID'],
                'UF_UPDATE_AT' => $now,
            ]);
        } else {
            $entityClass::add([
                'UF_FILE_ID' => $data['UF_FILE_ID'],
                'UF_WEBP_ID' => $data['UF_WEBP_ID'],
                'UF_CREATE_AT' => $now,
                'UF_UPDATE_AT' => $now,
            ]);
        }
    }
}
