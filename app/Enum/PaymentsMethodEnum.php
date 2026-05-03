<?php

namespace App\Enum;

enum PaymentsMethodEnum: int
{
    case CASH_ON_DELIVERY = 1;
    case CREDIT_CARD = 2;
    case WALLET = 3;
    case BANK_TRANSFER = 4;
}