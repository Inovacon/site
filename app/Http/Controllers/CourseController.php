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

    public function show(Faker $faker)
    {
        return view('courses.show', compact('faker'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(CourseRequest $request)
    {
        Course::create($request->all());

        return back();
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->all());

        return back();
    }
}
