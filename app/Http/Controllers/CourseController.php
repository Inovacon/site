<?php

namespace App\Http\Controllers;

use App\Course;
use Faker\Generator as Faker;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    public function index(Faker $faker)
    {
        return view('courses.index', compact('faker'));
    }

    public function store(CourseRequest $request)
    {
        Course::create($request->all());

        return back();
    }
}
