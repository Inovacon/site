<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Generator as Faker;

class NewsController extends Controller
{
    public function index(Faker $faker)
    {
        return view('news.index', compact('faker'));
    }

    public function show(Faker $faker)
    {
    	return view('news.show', compact('faker'));
    }
}
