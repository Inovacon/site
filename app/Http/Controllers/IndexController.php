<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Generator as Faker;

class IndexController extends Controller
{
    public function index(Faker $faker)
    {
    	return view('index.index', compact('faker'));
    }
}
