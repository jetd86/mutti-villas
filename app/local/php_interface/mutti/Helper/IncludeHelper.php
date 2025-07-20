<?php

namespace App\Helper;

class IncludeHelper
{
    public static function getIncludeSvg($svgFile): bool|string
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/local/assets/assets/icons/' . $svgFile;
        return file_exists($path) ? file_get_contents($path) : '';
    }
}
