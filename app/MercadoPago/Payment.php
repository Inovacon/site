<?php

namespace App\MercadoPago;

use App\User;
use MercadoPago\Payer;
use MercadoPago\Preference;
use App\MercadoPago\Interfaces\Product;

class Payment
{
    /**
     * The URL that the user will be redirected to.
     *
     * @var string
     */
    protected $url;

    /**
     * Initialize the checkout process.
     *
     * @param  User    $user
     * @param  Product $product
     * @return static
     */
    public static function checkout(User $user, Product $product)
    {
        return (new static)->handle($user, $product);
    }

    /**
     * Get the url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Handle the checkout.
     *
     * @param  User    $user
     * @param  Product $product
     * @return $this
     * @throws \Exception
     */
    protected function handle(User $user, Product $product)
    {
        $preference = new Preference;

        $preference->items = [$product->toItem()];
        $preference->payer = $this->getPayerFromUser($user);

        $preference->save();

        $this->url = $preference->init_point;

        return $this;
    }

    /**
     * Get a \MercadoPago\Payer object based on the given User.
     *
     * @param  User $user
     * @return Payer
     * @throws \Exception
     */
    protected function getPayerFromUser(User $user)
    {
        $payer = new Payer;

        $payer->name = $user->name;
        $payer->email = $user->email;

        $payer->identification = [
            'number' => $user->cpf_cnpj,
            'type' => strlen($user->cpf_cnpj) === 11 ? 'CPF' : 'CNPJ',
        ];

        return $payer;
    }
}
