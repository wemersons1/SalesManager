<?php

namespace App\Repositories\Sale;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;

trait SaleTrait{
    protected function getSaleWithAmountCalculated($sale): Sale
    {
        $totalAmount = SaleProduct::where('sale_id', $sale->sale_id)
                            ->selectRaw('SUM(amount * price) as totalAmount')->first();
        $sale->amount = $totalAmount->totalAmount;
        $sale->save();
        return $sale->refresh();
    }

    protected function getPriceProduct($productId): float
    {
        $product = Product::find($productId);
        return $product->price;
    }
}