<?php

namespace Mutti\Enum;

enum OptionLocationEnum: string
{
    /** Заголовок */
    case LOCATION_HERO_TITLE = 'location_hero_title';
    /** Текст под заголовком */
    case LOCATION_HERO_DESCRIPTION = 'location_hero_description';

    case LOCATION_FIELD_CUSTOM_TEXT_DESCRIPTION = 'location_field_custom_text_description';
}
