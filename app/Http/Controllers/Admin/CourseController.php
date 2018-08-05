<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    public function create(Course $course)
    {
        return view('dashboard.courses.create', [
            'course' => $course,
            'courseTypes' => Category::where('type', 'course_type')->get(),
            'modalities' => Category::where('type', 'modality')->get(),
            'shifts' => Category::where('type', 'shift')->get(),
            'occupationAreas' => Category::where('type', 'occupation_area')->get(),
            'targetAudiences' => Category::where('type', 'target_audience')->get(),
        ]);
    }

    public function store(CourseRequest $request)
    {
        Course::create($request->all());

        return back()->with('flash', 'Curso criado.');
    }

    public function edit(Course $course)
    {
        return view('dashboard.courses.edit', [
            'course' => $course,
            'courseTypes' => Category::where('type', 'course_type')->get(),
            'modalities' => Category::where('type', 'modality')->get(),
            'shifts' => Category::where('type', 'shift')->get(),
            'occupationAreas' => Category::where('type', 'occupation_area')->get(),
            'targetAudiences' => Category::where('type', 'target_audience')->get(),
        ]);
    }

    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->all());

        return back()->with('flash', 'Curso editado.');
    }
}
