<?php

namespace App\Enum;

enum HomepageSectionsTypeEnum: int
{
    case PRODUCTS = 1;
    case CATEGORIES = 2;
    case BANNERS = 3;
    case HTML = 4;
}