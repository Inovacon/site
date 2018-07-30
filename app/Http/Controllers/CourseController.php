<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use Faker\Generator as Faker;

class CourseController extends Controller
{
    public function index(Faker $faker)
    {
        return view('courses.index', compact('faker')); 
    }

    public function store(CourseRequest $request)
    {
        Course::create(
            $request->only(array_keys($request->rules()))
        );

        return back();
    }
}
