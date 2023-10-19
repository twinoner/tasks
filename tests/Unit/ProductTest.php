<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_new_product(): void
    {
        $product = [
            "name" => "producto nuevo 2",
            "price" => 101.2,
            "description" => "Prosciutto filet mignon pork loin"
        ];
        $response = $this->postJson('/products', $product);

        $response
            ->assertStatus(201)
            ->assertJson($product);
    }
}
