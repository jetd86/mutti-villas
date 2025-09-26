<?php
namespace Mutti;

use Bitrix\Main\Config\Option;

class Options
{
    const MODULE_ID = 'mutti.core';

    public static function get($key, $default = ''): string
    {
        return Option::get(self::MODULE_ID, $key, $default);
    }

    public static function set($key, $value): void
    {
        Option::set(self::MODULE_ID, $key, $value);
    }

    public static function remove($key): void
    {
        Option::delete(self::MODULE_ID, ['name' => $key]);
    }
}
