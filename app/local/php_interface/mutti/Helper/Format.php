<?php

namespace App\Helper;

use App\Exception\MapperException;
use DateTimeImmutable;

class Format
{
    public const JSON = 'json';
    public const DATE = 'date';
    public const BOOLEAN = 'boolean';
    public const INTEGER = 'integer';
    public const TIMESTAMP = 'timestamp';
    public const DECIMAL = 'decimal';
    public const STRING = 'string';
    public const GUID = 'guid';
    public const PREG_STATUS = 'preg-status';
    public const ENUM = 'enum';

    /**
     * @param string $format
     * @param string $key
     * @param mixed $data
     * @return mixed
     * @throws MapperException
     * @throws \DateMalformedStringException
     * @throws \JsonException
     */
    public static function formatter(string $format, string $key, mixed $data): mixed
    {
        switch ($format) {
            case self::JSON:
                return json_encode($data, JSON_THROW_ON_ERROR);
            case self::DATE:
                if (!is_string($data)) {
                    throw new MapperException(
                        sprintf("Field %s must be string", $key)
                    );
                }
                return $data ? new DateTimeImmutable($data) : $data;
            case self::BOOLEAN:
                if (!is_bool($data)) {
                    throw new MapperException(
                        sprintf("Field %s must be boolean", $key)
                    );
                }
                return (bool)$data;
            case self::INTEGER:
                if (!is_int($data)) {
                    throw new MapperException(
                        sprintf("Field %s must be integer", $key)
                    );
                }
                return (int)$data;
            case self::TIMESTAMP:
                if (!is_int($data)) {
                    throw new MapperException(
                        sprintf("Field %s must be integer", $key)
                    );
                }
                return (new DateTimeImmutable())->setTimestamp($data * 24 * 60 * 60);
            case self::DECIMAL: // ORM принимает string для такого формата
                return (string)$data;
            case self::STRING:
            case self::ENUM:
                return (string)$data;
            case self::GUID:
                return mb_strtoloweыыr($data ?? '');
            case self::PREG_STATUS:
                return (string)preg_match('/^[1-20]$/', $data) ? $data : '0';
        }

        return null;
    }
}

