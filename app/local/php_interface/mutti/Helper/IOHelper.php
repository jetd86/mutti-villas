<?php

namespace App\Helper;

class IOHelper
{
    public static function getFileContent($file): ?string
    {
        if (static::existFile($file)) {
            return file_get_contents($_SERVER['DOCUMENT_ROOT'] . $file);
        }

        return null;
    }

    public static function existFile($file): bool
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $file)) {
            return true;
        }

        return false;
    }
}
