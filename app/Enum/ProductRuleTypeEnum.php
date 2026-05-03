<?php

namespace App\Enum;

enum ProductRuleTypeEnum: int
{
    case MANUAL = 1;
    case NEWEST = 2;
    case BEST_SELLING = 3;
    case MOST_VIEWED = 4;
    case HIGHEST_RATED = 5;
    case ON_SALE = 6;
    case RANDOM = 7;
    case CATEGORY_BASED = 8;
    case BRAND_BASED = 9;
}