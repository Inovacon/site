<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Generator as Faker;

class EventController extends Controller
{
    public function index(Faker $faker)
    {
    	return view('events.index', compact('faker'));
    }

    public function show(Faker $faker)
    {
    	return view('events.show', compact('faker'));
    }
}
