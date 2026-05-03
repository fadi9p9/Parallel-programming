<?php

namespace App\Enum;

enum DiscountTypeEnum: int
{
    case PERCENTAGE = 1;
    case FIXED = 2;
}