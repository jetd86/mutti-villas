<?php

namespace App\Services\Location\Action;

use Bitrix\Main\Data\Cache;

abstract class AbstractAction
{
    protected Cache $cache;
    protected int $cacheTime = 3600;
    protected ?string $iblockCode = null;
    protected ?string $iblockType = null;

    public function __construct()
    {
        $this->cache = Cache::createInstance();
    }

    public static function getInstance(): self
    {
        return new static();
    }

    public function setIblockCode(string $iblockCode): self
    {
        $this->iblockCode = $iblockCode;
        return $this;
    }

    public function setIblockType(string $iblockType): self
    {
        $this->iblockType = $iblockType;
        return $this;
    }

    abstract public function execute();
}
