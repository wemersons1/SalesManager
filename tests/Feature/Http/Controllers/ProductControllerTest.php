<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        Product::factory(1)->create();
    }
    public function test_index(): void
    {
       $response = $this->get(route('products.index'));
       $response->assertStatus(200)->assertJsonStructure([
        "*" => [
            "name", "price", "description"
        ]
       ]);
    }
}
