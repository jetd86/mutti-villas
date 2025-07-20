<?php

namespace App\Services\Location;

/**
 * @deprecated
 */
class LocationService
{
    /**
     * @deprecated
     */
    public function getSections(string $iblockCode, string $iblockType = '')
    {
        return Action\GetSectionAction::getInstance()
            ->setIblockCode($iblockCode)
            ->setIblockType($iblockType)
            ->execute();
    }

    /**
     * @deprecated
     */
    public function getElements(int $sectionId, string $iblockCode)
    {
        return Action\GetSectionElements::getInstance()
            ->setIblockCode($iblockCode)
            ->setSectionId($sectionId)
            ->execute();
    }
}
