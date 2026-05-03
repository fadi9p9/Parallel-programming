<?php

namespace App\Enum;

enum OrdersStatusEnum: int
{
    case CREATED = 1;
    case CONFIRMED = 2;
    case PREPARING = 3;
    case OUT_FOR_DELIVERY = 4;
    case DELIVERED = 5;
    case COMPLETED = 6;
    case CANCELED = 7;
}