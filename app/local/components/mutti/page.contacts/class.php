<?php

use App\Admin\AbstractComponent;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

class MuttiPageContactsComponent extends AbstractComponent
{
    public function executeComponent(): void
    {
        $this->includeComponentTemplate();
    }

    public function getAddress(): ?string
    {
        if (array_key_exists('OFFICE_ADDRESS', $this->arParams)) {
            return $this->arParams['OFFICE_ADDRESS'];
        }

        return null;
    }

    public function getEmail(): ?string
    {
        if (array_key_exists('OFFICE_EMAIL', $this->arParams)) {
            return $this->arParams['OFFICE_EMAIL'];
        }

        return null;
    }

    public function getSocialIcons(): ?array
    {
        if (array_key_exists('SOCIAL_ICONS', $this->arParams) && is_array($this->arParams['SOCIAL_ICONS'])) {
            return $this->arParams['SOCIAL_ICONS'];
        }

        return null;
    }

    public function getPhone($key, $clear = false): ?string
    {
        if (array_key_exists($key, $this->arParams)) {
            return $clear
                ? $this->clearPhone($this->arParams[$key])
                : $this->arParams[$key];
        }

        return null;
    }

    private function clearPhone($phone): string
    {
        return str_replace(' ', '', $phone);
    }
}
