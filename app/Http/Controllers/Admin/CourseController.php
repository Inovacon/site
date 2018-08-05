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
        return view('dashboard.courses.create',
            array_merge(compact('course'), $this->getCategories())
        );
    }

    public function store(CourseRequest $request)
    {
        Course::create($request->all());

        return back()->with('flash', 'Curso criado.');
    }

    public function edit(Course $course)
    {
        return view('dashboard.courses.edit',
            array_merge(compact('course'), $this->getCategories())
        );
    }

    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->all());

        return back()->with('flash', 'Curso editado.');
    }

    protected function getCategories()
    {
        return [
            'courseTypes' => Category::courseType()->get(),
            'modalities' => Category::modality()->get(),
            'shifts' => Category::shift()->get(),
            'occupationAreas' => Category::occupationArea()->get(),
            'targetAudiences' => Category::targetAudience()->get(),
        ];
    }
}
