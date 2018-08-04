<?php

namespace App\Http\Controllers;

use App\Course;
use Faker\Generator as Faker;

class CourseController extends Controller
{
    public function index(Faker $faker)
    {
        return view('courses.index', compact('faker'));
    }

    public function show(Faker $faker)
    {
        return view('courses.show', compact('faker'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }
}
