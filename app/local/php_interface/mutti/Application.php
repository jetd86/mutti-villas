<?php

namespace App;

class Application
{
    public static function getDomain(): string
    {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];
    }

    public static function isHomePage(): bool
    {
        return static::getPageUri() === '/';
    }

    public static function getPageUri(): string
    {
        global $APPLICATION;
        return $APPLICATION->GetCurDir();
    }

    public static function getPageName(): string
    {
        global $APPLICATION;
        return trim($APPLICATION->GetCurPage(false), '/');
    }
}
