<?php

namespace Tests\Unit\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\Framework\TestCase;

class SaleTest extends TestCase
{
    private Sale $sale;
    protected function setUp(): void
    {
        parent::setUp();
        $this->sale = new Sale();
    }
    public function test_fillable_attributes(): void
    {
        $this->assertEqualsCanonicalizing([
            'amount',
            'status_id'
        ], $this->sale->getFillable());
    }
    public function test_hidden_attributes(): void
    {
        $this->assertEqualsCanonicalizing([
            'status_id',
            'created_at',
            'updated_at',
        ], $this->sale->getHidden());
    }
    public function test_if_use_traits(): void
    {
        $traits = [
            HasFactory::class
        ];
        $saleTraits = array_keys(class_uses(Sale::class));
        $this->assertEquals($traits, $saleTraits);
    }
    public function test_dates_attribute(): void
    {
        $dates = [
            'created_at',
            'updated_at'
        ];
        $saleDates = $this->sale->getDates();
        foreach ($dates as $date) {
            $this->assertContains($date, $saleDates);
        }
    }
}
