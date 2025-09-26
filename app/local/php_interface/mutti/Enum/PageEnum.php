<?php

namespace App\Enum;

enum PageEnum: string
{
    case PAGE_HOME = 'home';
    case PAGE_ABOUT = 'about-page';
    case PAGE_CONTACTS = 'contacts-page';
    case PAGE_INFRASTRUCTURE = 'infrastructure-page';
    case PAGE_LOCATION = 'location-page';
    case PAGE_MUTTI_GUIDE = 'guide-page';
    case PAGE_VILLAS = 'villas-page';
}
