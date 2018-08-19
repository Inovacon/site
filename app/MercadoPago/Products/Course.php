<?php

namespace App\MercadoPago\Products;

class Course extends AbstractProduct
{
    /**
     * Map Model attributes to Item attributes.
     *
     * @return array
     */
    protected function map()
    {
        return [
            'id'          => 'id',
            'title'       => 'name',
            'unit_price'  => 'price',
            'description' => 'description',
            'picture_url' => 'publicImagePath',
        ];
    }
}
