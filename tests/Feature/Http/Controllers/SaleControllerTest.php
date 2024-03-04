<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SaleControllerTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        Sale::factory(1)->create();
    }
    public function test_index(): void
    {
       $response = $this->get(route('sales.index'));
       $response->assertStatus(200)->assertJsonStructure([
        "*" => ["sale_id", "amount", 'products']
       ]);
    }
}
