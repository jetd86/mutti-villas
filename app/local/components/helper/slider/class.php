<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use App\Admin\AbstractComponent;
use App\Enum\SliderTemplateEnum;
use App\Services\Construction\ConstructionService;
use App\Services\Villas\VillasService;

class HelperSliderComponent extends AbstractComponent
{
    public function executeComponent(): void
    {
        $this->loadData();
        $this->includeComponentTemplate();
    }

    private function loadData(): void
    {
        $this->arResult = [];
        switch ($this->getTemplateName()):
            case SliderTemplateEnum::VillasHomepage->value:
                $this->arResult['ITEMS'] = VillasService::getInstance()->getIBlockData()->getResult();
                break;
            case SliderTemplateEnum::ConstructionHomepage->value:
                $this->arResult['ITEMS'] = ConstructionService::getInstance()->getStorageProperties()->getResult();
                break;
            default:
                $this->arResult = $this->arParams;
                break;
        endswitch;
    }
}
