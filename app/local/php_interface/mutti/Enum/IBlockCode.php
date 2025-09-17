<?php

namespace App\Enum;

enum IBlockCode: string
{
    case REFERENCE_SOCIAL = 'social';
    case ABOUT_ADVANTAGES = 'aboutAdvantages';
    case PAGE_HOMEPAGE = 'home';
    case PAGE_ABOUT = 'about';
    case PAGE_INFRASTRUCTURE = 'infrastructure';
    case PAGE_VILLAS = 'villas';
    case PAGE_MUTTI_GUIDE = 'muttiGuide';
    case PAGE_LOCATION = 'location';
    case STORAGE_EQUIPMENT = 'equipment';
    case STORAGE_CONSTRUCTION = 'construction';
}
