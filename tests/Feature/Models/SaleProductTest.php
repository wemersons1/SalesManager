<?php

namespace Tests\Feature;

use App\Enums\SaleStatusEnum;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SaleProductTest extends TestCase
{
    use RefreshDatabase;
    public function test_create(): void
    {
        $product = Product::factory()->create();      
        $sale = Sale::factory()->create();
        $data = [
            'amount' => 4,
            'product_id' => $product->product_id,
            'price' => $product->price,
            'sale_id' => $sale->sale_id,
        ];
        $saleProduct = SaleProduct::create($data);
        $saleProduct->refresh();

        foreach ($data as $key => $value) {
            $this->assertEquals($value, $saleProduct->{$key});
        }        
    }
}
