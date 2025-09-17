<?php

namespace App\Services\Construction\Action;

use App\Enum\IBlockCode;
use App\Helper\IBlockHelper;
use App\Services\AbstractAction;
use Bitrix\Iblock\Model\Section;
use Bitrix\Main\Type\Date;
use CFile;

class GetStorageProperties extends AbstractAction
{
    public function __construct()
    {
        parent::__construct();
        $this->iblockCode = IBlockCode::STORAGE_CONSTRUCTION->value;
    }

    public function execute(): static
    {
        return $this
            ->getSections();
    }

    protected function getSections(): static
    {
        $entity = IBlockHelper::getIBlockIdByCode(IBlockCode::STORAGE_CONSTRUCTION->value);
        $entity = Section::compileEntityByIblock($entity);
        $sections = $entity::query()
            ->setSelect(['ID', 'UF_*'])
            ->addFilter('ACTIVE', 'Y')
            ->addOrder('UF_DATE', 'DESC')
            ->exec();
        $sections->addFetchDataModifier(function ($row) {
            if ($files = $row['UF_FILES']) {
                $row['GALLERY'] = [];
                foreach ($files as $file) {
                    $row['GALLERY'][] = CFile::GetFileArray($file);
                }
                unset($row['UF_FILES']);
            }

            /** @var Date $date */
            if ($date = $row['UF_DATE']) {
                $row['GROUP'] = $date->format('Y-m');
                unset($row['UF_DATE']);
            }

            return $row;
        });

        $this->result = $sections->fetchAll();
        return $this;
    }

    private function getMonthNameNominative($monthNumber): string
    {
        static $months = [
            1 => 'Январь',
            2 => 'Февраль',
            3 => 'Март',
            4 => 'Апрель',
            5 => 'Май',
            6 => 'Июнь',
            7 => 'Июль',
            8 => 'Август',
            9 => 'Сентябрь',
            10 => 'Октябрь',
            11 => 'Ноябрь',
            12 => 'Декабрь',
        ];

        return $months[(int)$monthNumber] ?? '';
    }
}
