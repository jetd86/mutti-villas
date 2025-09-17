<?

use Bitrix\Main\Config\Option;
use Mutti\Enum\ModuleEnum;
use Mutti\Enum\OptionHomeEnum;

$aMenuLinks = [
    [
        "3D тур",
        Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_BANNER_LINK->value),
        [],
        [
            'TARGET' => '_blank',
            'MOBILE_TITLE' => '3D',
            'FOOTER_TITLE' => '3D тур',
        ],
        ""
    ],
    [
        "О нас",
        "/about/",
        [],
        [],
        ""
    ],
    [
        "Mutti гид",
        "/mutti-guide/",
        [],
        [],
        ""
    ],
    [
        "Наши виллы",
        "/villas/",
        [],
        [],
        ""
    ],
    [
        "Инфраструктура",
        "/infrastructure/",
        [],
        [],
        ""
    ],
    [
        "Локация",
        "/location/",
        [],
        [],
        ""
    ],
    [
        "Контакты",
        "/contacts/",
        [],
        [],
        ""
    ],
];
?>
