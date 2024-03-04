<?php

namespace Tests\Unit\Models;

use App\Models\SaleStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\Framework\TestCase;

class SaleStatusTest extends TestCase
{
    private SaleStatus $saleStatus;
    protected function setUp(): void
    {
        parent::setUp();
        $this->saleStatus = new SaleStatus();
    }
    public function test_fillable_attributes(): void
    {
        $this->assertEqualsCanonicalizing([
            'id',
            'name'
        ], $this->saleStatus->getFillable());
    }
    public function test_hidden_attributes(): void
    {
        $this->assertEqualsCanonicalizing([
            'created_at',
            'updated_at'
        ], $this->saleStatus->getHidden());
    }
    public function test_if_use_traits(): void
    {
        $traits = [
            HasFactory::class
        ];
        $saleTraits = array_keys(class_uses(SaleStatus::class));
        $this->assertEquals($traits, $saleTraits);
    }
    public function test_dates_attribute(): void
    {
        $dates = [
            'created_at',
            'updated_at'
        ];
        $saleDates = $this->saleStatus->getDates();
        foreach ($dates as $date) {
            $this->assertContains($date, $saleDates);
        }
    }
}
