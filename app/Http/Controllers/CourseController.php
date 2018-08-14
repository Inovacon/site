<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest();

        if ($areaId = request('area')) {
            $courses->whereHas('occupationArea', function ($query) use ($areaId) {
                $query->where('id', $areaId);
            });
        }

        return view('courses.index', [
            'courses' => $courses->paginate(9),
            'coursesCount' => Course::count(),
            'occupationAreas' => Category::occupationArea()->get(),
        ]);
    }

    public function show(Course $course)
    {
        return view('courses.show', [
            'course' => $course,
            'relatedCourses' => Course::whereHas('occupationArea', function ($query) use ($course) {
                $query->where('type', $course->occupationArea->name);
            })
        ]);
    }
}
