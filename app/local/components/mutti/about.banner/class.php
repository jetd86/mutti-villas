<?php

use App\Admin\AbstractComponent;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die();

class MuttiAboutBannerComponent extends AbstractComponent
{
  public function onPrepareComponentParams($arParams): array
  {
    if (array_key_exists('SHOW_BUTTON', $arParams)) {
      $arParams['SHOW_BUTTON'] = 'Y';
    }

    return $arParams;
  }

  public function executeComponent(): void
  {
    $this->includeComponentTemplate();
  }
}
