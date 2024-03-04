<?php

namespace Tests\Unit\Models;

use App\Models\SaleProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\Framework\TestCase;

class SaleProductTest extends TestCase
{
    private SaleProduct $saleProduct;
    protected function setUp(): void
    {
        parent::setUp();
        $this->saleProduct = new SaleProduct();
    }
    public function test_fillable_attributes(): void
    {
        $this->assertEqualsCanonicalizing([
            'amount',
            'product_id',
            'price',
            'sale_id'
        ], $this->saleProduct->getFillable());
    }
    public function test_hidden_attributes(): void
    {
        $this->assertEqualsCanonicalizing([], $this->saleProduct->getHidden());
    }
    public function test_if_use_traits(): void
    {
        $traits = [
            HasFactory::class
        ];
        $saleTraits = array_keys(class_uses(SaleProduct::class));
        $this->assertEquals($traits, $saleTraits);
    }
    public function test_dates_attribute(): void
    {
        $dates = [
            'created_at',
            'updated_at'
        ];
        $saleDates = $this->saleProduct->getDates();
        foreach ($dates as $date) {
            $this->assertContains($date, $saleDates);
        }
    }
}
