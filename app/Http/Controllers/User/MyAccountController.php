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
    	$user->birth_date = strftime("%d-%m-%Y", strtotime($user->birth_date));

    	return view('user.my-account.edit', compact('user'));
    }
}
