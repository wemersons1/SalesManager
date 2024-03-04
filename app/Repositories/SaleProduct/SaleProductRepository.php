<?php

namespace App\Repositories\SaleProduct;

use App\Models\SaleProduct;

class SaleProductRepository implements SaleProductRepositoryInterface {    
    public function createSaleProduct($data)
    {
        return SaleProduct::create($data);  
    }
}