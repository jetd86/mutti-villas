<?php

namespace App\Services;

use App\Helper\IBlockHelper;
use App\Traits\InstantiableTrait;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\Iblock;
use Bitrix\Iblock\Model\Section;
use Bitrix\Main\Data\Cache;
use CFile;

abstract class AbstractAction
{
    use InstantiableTrait;

    protected Cache $cache;
    protected bool $useCache = false;
    protected ?string $cacheId = null;
    protected ?string $cachePath = null;
    protected ?int $cacheTime = 3600;

    protected ?string $iblockCode = null;
    protected ?int $iblockId = null;

    protected array $result = [];
    protected array $errors = [];

    public function __construct()
    {
        $this->cache = Cache::createInstance();
    }

    abstract public function execute();

    public function getResult(): array
    {
        return $this->result;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function getSections(): static
    {
        if (!$this->checkRequire()) {
            return $this;
        }

        try {
            $iblockId = $this->getIblockId();
            $iblockClass = Section::compileEntityByIblock($iblockId);
            $sections = $iblockClass::query()
                ->setSelect(['ID', 'SORT', 'NAME', 'CODE', 'PICTURE', 'DESCRIPTION', 'UF_*'])
                ->addFilter('=IBLOCK_ID', $iblockId)
                ->addFilter('ACTIVE', 'Y')
                ->addOrder('SORT')
                ->exec();
            $sections->addFetchDataModifier(function ($row) {
                if ($picture = $row['PICTURE']) {
                    $row['PICTURE'] = CFile::GetFileArray($picture);
                }

                return $row;
            });

            $sections = $sections->fetchAll();
            $this->result = array_combine(array_column($sections, 'CODE'), $sections);
        } catch (\Throwable $exception) {
            $this->errors[] = $exception->getMessage();
            return $this;
        }

        return $this;
    }

    private function checkRequire(): bool
    {
        if (!$this->useCache) {
            return true;
        }

        $checkCacheId = is_null($this->cacheId);
        $checkCachePath = is_null($this->cachePath);
        $checkCacheTime = is_null($this->cacheTime);
        $checkIblockId = is_null($this->iblockId);
        $checkIblockCode = is_null($this->iblockCode);

        if ($checkCacheId || $checkCachePath || $checkCacheTime || $checkIblockId || $checkIblockCode) {
            return false;
        }

        return true;
    }

    protected function getIblockId(): ?int
    {
        if (is_null($this->iblockCode)) {
            return null;
        }

        $this->iblockId = IBlockHelper::getIBlockIdByCode($this->iblockCode);
        return $this->iblockId;
    }

    protected function getIblockClass($iblockId): ?string
    {
        return Iblock::wakeUp($iblockId)->getEntityDataClass();
    }

    protected function getElements(): static
    {
        if (!$this->checkRequire()) {
            return $this;
        }

        $iblockId = $this->getIblockId();
        foreach ($this->result as $code => $section) {
            $elements = ElementTable::query()
                ->setSelect(['ID', 'NAME', 'CODE', 'PREVIEW_*'])
                ->addFilter('ACTIVE', 'Y')
                ->addFilter('IBLOCK_ID', $iblockId)
                ->addFilter('IBLOCK_SECTION_ID', $section['ID'])
                ->addOrder('SORT')
                ->exec();
            $elements->addFetchDataModifier(function ($row) {
                if ($row['PREVIEW_PICTURE']) {
                    $row['PREVIEW_PICTURE'] = CFile::GetFileArray($row['PREVIEW_PICTURE']);
                }

                return $row;
            });

            $elements = $elements->fetchAll();
            $elements = array_combine(array_column($elements, 'CODE'), $elements);
            $this->result[$code]['ITEMS'] = $elements;
        }

        return $this;
    }
}
