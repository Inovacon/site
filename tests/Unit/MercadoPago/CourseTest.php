<?php

namespace Tests\Unit\MercadoPago;

use Tests\TestCase;
use MercadoPago\SDK;
use MercadoPago\Item;
use App\MercadoPago\Products\Course;
use App\MercadoPago\Interfaces\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        SDK::setClientId('1');
        SDK::setClientSecret('1');
    }

    /** @test */
    function it_can_be_converted_to_a_mercado_pago_item()
    {
        $course = new Course($model = make(\App\Course::class));

        $this->assertInstanceOf(Product::class, $course);
        $this->assertInstanceOf(Item::class, $item = $course->toItem());
        $this->assertEquals($model->id, $item->id);
        $this->assertEquals($model->name, $item->title);
        $this->assertEquals($model->description, $item->description);
        $this->assertEquals(1, $item->quantity);
        $this->assertEquals('BRL', $item->currency_id);
        $this->assertEquals($model->price, $item->unit_price);
        $this->assertEquals($model->publicImagePath, $item->picture_url);
    }
}
