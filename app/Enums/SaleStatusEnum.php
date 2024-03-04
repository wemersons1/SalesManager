<?php
namespace App\Enums;

enum SaleStatusEnum: int
{
    case FINISHED = 1;
    case PENDING = 2;
    case CANCELED = 3;
}