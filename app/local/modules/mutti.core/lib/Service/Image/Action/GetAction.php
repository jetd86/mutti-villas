<?php

namespace Mutti\Service\Image\Action;

use Bitrix\Highloadblock as HL;
use Mutti\Enum\BlockCode;
use Mutti\Helper\HighloadHelper;
use Mutti\Service\AbstractAction;

class GetAction extends AbstractAction
{
    private array $file;

    public function setFile(array $file): static
    {
        $this->file = $file;
        return $this;
    }

    public function execute(): array
    {
        $entity = HighloadHelper::getHlBlockIdByCode(BlockCode::WebpConversionLog->name);
        if (!$entity) {
            return [];
        }

        $entity = HL\HighloadBlockTable::compileEntity($entity);
        $entity = $entity->getDataClass();
        $result = $entity::query()
            ->addSelect('UF_FILE_ID', 'FILE_ID')
            ->addSelect('UF_WEBP_ID', 'WEBP_ID')
            ->addFilter('UF_FILE_ID', $this->file['ID'])
            ->exec();
        $result->addFetchDataModifier(function (&$row) {
            return \CFile::GetFileArray($row['WEBP_ID']);
        });

        return $result->fetch() ?: [];
    }
}
