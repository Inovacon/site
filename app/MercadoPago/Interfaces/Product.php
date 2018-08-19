<?php

namespace App\MercadoPago\Interfaces;

use MercadoPago\Item;

interface Product
{
    /**
     * Convert the model to a \MercadoPago\Item.
     *
     * @return Item
     */
    public function toItem();
}
