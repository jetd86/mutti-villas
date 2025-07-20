<?php

use App\Admin\AbstractComponent;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die();

class MuttiAboutContentComponent extends AbstractComponent
{
  public function executeComponent(): void
  {
    $this->includeComponentTemplate();
  }
}
