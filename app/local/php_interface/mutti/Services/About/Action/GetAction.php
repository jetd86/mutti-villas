<?php

namespace App\Services\About\Action;

use App\Enum\IBlockCode;
use App\Services\AbstractAction;

class GetAction extends AbstractAction
{
    public function __construct()
    {
        parent::__construct();
        $this->iblockCode = IBlockCode::PAGE_ABOUT->value;
    }

    public function execute(): static
    {
        return $this
            ->getSections()
            ->getElements();
    }
}
