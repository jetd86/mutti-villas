<?php

namespace App\Services\HomePage\Action;

use App\Enum\IBlockCode;
use App\Services\AbstractAction;

class GetAction extends AbstractAction
{
    public function __construct()
    {
        parent::__construct();
        $this->iblockCode = IBlockCode::PAGE_HOMEPAGE->value;
    }

    public function execute(): static
    {
        return $this
            ->getSections()
            ->getElements();
    }
}
