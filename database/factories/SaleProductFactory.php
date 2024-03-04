<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleProduct>
 */
class SaleProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sale = Sale::factory()->create();
        $product = Product::factory()->create();
        return [
            "sale_id" => $sale->sale_id,
            "product_id" => $product->product_id,
            "product" => $product->price
        ];
    }
}
