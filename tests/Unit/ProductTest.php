<?php

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test accessor price dalam format Rupiah.
     */
    public function test_price_rupiah_accessor_formats_correctly(): void
    {
        $product = new Product([
            'price' => 750000,
        ]);

        $this->assertSame('Rp 750.000', $product->price_rupiah);
        $this->assertSame('Rp 750.000', $product->formatted_price);
        $this->assertSame('Rp 750.000', $product->rupiah_price);
    }
}
