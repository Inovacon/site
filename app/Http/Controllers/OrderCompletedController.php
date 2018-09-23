<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderCompletedController extends Controller
{
    public function success()
    {
        return view('order-completed.success');
    }

    public function failure()
    {
        return view('order-completed.failure');
    }

    public function pending()
    {
        return view('order-completed.pending');
    }
}
