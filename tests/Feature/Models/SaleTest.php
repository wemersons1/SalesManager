<?php

namespace Tests\Feature;

use App\Enums\SaleStatusEnum;
use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SaleTest extends TestCase
{
    use RefreshDatabase;

    public function test_list(): void
    {
        Sale::factory(1)->create();
        $sales = Sale::all();
        $this->assertCount(1, $sales);
        $productKeys = array_keys($sales->first()->getAttributes());
        $this->assertEqualsCanonicalizing([
            'sale_id',
            'amount',
            'status_id',
            'created_at',
            'updated_at'
        ], $productKeys);
    }
    public function test_create(): void
    {
        $sale = Sale::create([
            'amount' => 100,
            'status_id' => SaleStatusEnum::PENDING->value
        ]);

        $sale->refresh();

        $this->assertEquals(100, $sale->amount);
        $this->assertEquals(SaleStatusEnum::PENDING->value, $sale->status_id);
    }

    public function test_update(): void
    {
        $sale = Sale::factory()->create([
            'amount' => 100,
            'status_id' => SaleStatusEnum::PENDING->value
        ]);

        $data = [
            'amount' => 200,
            'status_id' => SaleStatusEnum::FINISHED->value
        ];

        $sale->update($data);

        foreach ($data as $key => $value) {
            $this->assertEquals($value, $sale->{$key});
        }
    }

    public function test_cancel(): void
    {
        $data = [
            'amount' => 100,
            'status_id' => SaleStatusEnum::CANCELED->value
        ];

        $sale = Sale::factory()->create($data);

        foreach ($data as $key => $value) {
            $this->assertEquals($value, $sale->{$key});
        }
    }
}
