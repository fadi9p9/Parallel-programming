<?php

namespace App\Enum;

enum OrderItemsDiscountTypeEnum: int
{
    case PERCENTAGE = 1;
    case FIXED = 2;
}