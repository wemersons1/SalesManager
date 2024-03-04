<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'product_id',
        'price',
        'sale_id'
    ];
}
