<?php

namespace App\Http\Controllers\Payment;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MercadoPagoController extends Controller implements PaymentControllerInterface
{
    /**
     * Process the payment request.
     *
     * @param  Request $request
     * @param  Course  $course
     * @return mixed
     */
    public function store(Request $request)
    {
        //
    }
}
