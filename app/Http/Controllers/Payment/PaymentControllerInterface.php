<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;

interface PaymentControllerInterface
{
    /**
     * Process the payment request.
     *
     * @param  Request $request
     * @return mixed
     */
    public function store(Request $request);
}
