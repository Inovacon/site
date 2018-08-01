<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Generator as Faker;

class PagesController extends Controller
{
    public function index(Faker $faker)
    {
        return view('pages.index', compact('faker'));
    }
}
