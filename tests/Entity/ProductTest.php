<?php

namespace App\Tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /** @var Product */
    protected $product;

    protected function setUp()
    {
        parent::setUp();
        $this->product = new Product();
        $this->product->setPrice(10);
    }

    public function testGetTotalPriceRate1()
    {
        $this->assertSame($this->product->getTotalPriceRate1(), 11.7);
    }

    public function testGetTotalPriceRate2()
    {
        $this->assertSame($this->product->getTotalPriceRate2(), 10.3);
    }
}
