<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('active', true)->latest();

        if ($areaId = request('area')) {
            $courses->whereHas('occupationArea', function ($query) use ($areaId) {
                $query->where('id', $areaId);
            });
        }

        return view('courses.index', [
            'courses' => $courses->paginate(9),
            'coursesCount' => Course::where('active', true)->count(),
            'occupationAreas' => Category::occupationArea()->get(),
        ]);
    }

    public function show(Course $activeCourse)
    {
        return view('courses.show', [
            'course' => $activeCourse,
            'relatedCourses' => Course::whereHas('occupationArea', function ($query) use ($activeCourse) {
                $query->where('name', $activeCourse->occupationArea->name);
            })->get()
        ]);
    }
}
