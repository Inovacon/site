<?php

namespace App\MercadoPago\Products;

use MercadoPago\Item;
use App\MercadoPago\Interfaces\Product;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractProduct implements Product
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Course constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Convert the underlying course to a \MercadoPago\Item.
     *
     * @return Item
     * @throws \Exception
     */
    public function toItem()
    {
        $item = new Item;
        $item->quantity = $this->quantity();
        $item->currency_id = $this->currency();

        foreach ($this->map() as $itemAttribute => $modelAttribute) {
            $item->{$itemAttribute} = $this->model->{$modelAttribute};
        }

        return $item;
    }

    /**
     * Get the default quantity.
     *
     * @return int
     */
    protected function quantity()
    {
        return 1;
    }

    /**
     * Get the default currency identifier.
     *
     * @return string
     */
    protected function currency()
    {
        return 'BRL';
    }

    /**
     * Get an \MercadoPago\Item representation of the Model as an array.
     *
     * @return array
     */
    abstract protected function map();
}
