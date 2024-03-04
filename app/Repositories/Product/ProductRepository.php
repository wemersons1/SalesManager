<?php

namespace App\Repositories\Product;

use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface {    
    public function getAllProducts()
    {
        return DB::table('products')->select('name', 'price', 'description')
                    ->get();
    }
}