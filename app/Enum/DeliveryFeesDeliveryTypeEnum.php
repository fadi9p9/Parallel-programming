<?php

namespace App\Enum;

enum DeliveryFeesDeliveryTypeEnum: int
{
    case STANDARD = 1;
    case EXPRESS = 2;
    case SAME_DAY = 3;
}