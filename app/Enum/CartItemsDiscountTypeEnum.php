<?php

namespace App\Enum;

enum CartItemsDiscountTypeEnum: int
{
    case PERCENTAGE = 1;
    case FIXED = 2;
}