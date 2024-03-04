<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    private Product $product;
    protected function setUp(): void
    {
        parent::setUp();
        $this->product = new Product();
    }
    public function test_fillable_attributes(): void
    {
        $this->assertEqualsCanonicalizing([], $this->product->getFillable());
    }
    public function test_hidden_attributes(): void
    {
        $this->assertEqualsCanonicalizing([
            'created_at',
            'updated_at',
            'pivot',
            'description'
        ], $this->product->getHidden());
    }
    public function test_if_use_traits(): void
    {
        $traits = [
            HasFactory::class
        ];
        $productTraits = array_keys(class_uses(Product::class));
        $this->assertEquals($traits, $productTraits);
    }
    public function test_dates_attribute(): void
    {
        $dates = [
            'created_at',
            'updated_at'
        ];
        $productDates = $this->product->getDates();
        foreach ($dates as $date) {
            $this->assertContains($date, $productDates);
        }
    }
}
