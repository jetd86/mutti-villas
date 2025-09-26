<?php

namespace App\Services;

class Logger
{
    public static function info($message)
    {
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/logs/log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}
