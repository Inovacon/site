<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyAccountController extends Controller
{
    public function index()
    {
    	return view('user.my-account.index');
    }

    public function edit() {
    	$user = \Auth::user();

    	return view('user.my-account.edit', compact('user'));
    }
}
