<?php
error_reporting(E_ALL);

$_SERVER['DOCUMENT_ROOT'] = dirname(__DIR__, 2);
require $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

use Bitrix\Main\IO\Directory;
use Bitrix\Main\Loader;
use Bitrix\Iblock\Iblock;

$logPath = $_SERVER["DOCUMENT_ROOT"] . "/upload/sync_images.log";

function logMessage($message): void
{
    file_put_contents(
        $_SERVER["DOCUMENT_ROOT"] . "/upload/sync_images.log",
        "[" . date('Y-m-d H:i:s') . "] " . $message . PHP_EOL,
        FILE_APPEND
    );
}

function getIblocksByType($iblockType): array
{
    $result = [];
    $res = \CIBlock::GetList([], ['TYPE' => $iblockType, 'ACTIVE' => 'Y']);
    while ($iblock = $res->Fetch()) {
        $result[] = $iblock;
    }
    return $result;
}

function convertToWebp($sourcePath, $webpPath): bool
{
    try {
        $image = new Imagick($sourcePath);
        $image->setImageFormat('webp');
        $image->setImageCompressionQuality(85);
        return $image->writeImage($webpPath);
    } catch (Throwable $e) {
        logMessage("WEBP convert error for {$sourcePath}: " . $e->getMessage());
        return false;
    }
}

function syncIblockImages($iblock): void
{
    $iblockCode = $iblock['CODE'];
    $iblockId = (int)$iblock['ID'];
    $uploadDir = "/local/assets/assets/images/generated/{$iblockCode}/";
    $absUploadDir = $_SERVER["DOCUMENT_ROOT"] . $uploadDir;

    if (!Directory::isDirectoryExists($absUploadDir)) {
        Directory::createDirectory($absUploadDir);
    }

    $elements = \CIBlockElement::GetList([],
        ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
        false,
        false,
        ['ID', 'NAME', 'CODE', 'PREVIEW_PICTURE', 'DETAIL_PICTURE']);

    $copied = 0;
    while ($element = $elements->GetNext()) {
        foreach (['PREVIEW_PICTURE', 'DETAIL_PICTURE'] as $field) {
            if (!empty($element[$field])) {
                $file = \CFile::GetFileArray($element[$field]);
                if (!$file) continue;

                $sourcePath = $_SERVER["DOCUMENT_ROOT"] . $file['SRC'];
                $targetPath = $absUploadDir . basename($file['SRC']);
                $targetWebpPath = preg_replace('/\.\w+$/', '.webp', $targetPath);

                if (file_exists($sourcePath)) {
                    if (!file_exists($targetPath)) {
                        copy($sourcePath, $targetPath);
                        logMessage("Copied: {$file['SRC']} → {$targetPath}");
                    }
                    if (!file_exists($targetWebpPath)) {
                        if (convertToWebp($sourcePath, $targetWebpPath)) {
                            logMessage("Created WebP: {$targetWebpPath}");
                        }
                    }
                    $copied++;
                }
            }
        }
    }

    logMessage("Iblock '{$iblockCode}' (ID {$iblockId}): $copied images processed.");
}

try {
    if (!Loader::includeModule('iblock')) {
        throw new \Exception('Module "iblock" is not loaded');
    }

    if (!class_exists('Imagick')) {
        throw new \Exception('Imagick not installed. Please install PHP Imagick extension.');
    }

    $iblockType = 'content'; // ← Укажи свой тип инфоблока
    $iblocks = getIblocksByType($iblockType);

    logMessage("===== Sync started for iblock type '{$iblockType}' =====");

    foreach ($iblocks as $iblock) {
        syncIblockImages($iblock);
    }

    logMessage("===== Sync finished =====");
} catch (\Throwable $e) {
    logMessage("Error: " . $e->getMessage());
}
