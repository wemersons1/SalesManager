<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sale extends Model
{
    use HasFactory;
    protected $primaryKey = 'sale_id';
    protected $fillable = [
        'amount',
        'status_id'
    ];

    protected $hidden = [
        'status_id',
        'created_at',
        'updated_at',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'sale_products', 'sale_id', 'product_id');
    }

    public function status(): HasOne 
    {
        return $this->hasOne(SaleStatus::class, 'id', 'status_id');
    }
}
