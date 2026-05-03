<?php

namespace App\Enum;

enum SalesReportsCacheReportTypeEnum: int
{
    case DAILY = 1;
    case WEEKLY = 2;
    case MONTHLY = 3;
    case YEARLY = 4;
}