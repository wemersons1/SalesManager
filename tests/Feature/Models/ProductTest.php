<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_list(): void
    {
        Product::factory(1)->create();
        $products = Product::all();
        $this->assertCount(1, $products);
        $productKeys = array_keys($products->first()->getAttributes());
        $this->assertEqualsCanonicalizing([
            'product_id',
            'name',
            'price',
            'description',
            'created_at',
            'updated_at'
        ], $productKeys);
    }
}
