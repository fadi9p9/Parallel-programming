<?php

namespace App\Enum;

enum PaymentsStatusEnum: int
{
    case PENDING = 1;
    case PAID = 2;
    case FAILED = 3;
    case REFUNDED = 4;
    case CANCELED = 5;
}