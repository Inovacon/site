<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseActivationController extends Controller
{
    public function store(Course $course)
    {
        $course->activate();
    }

    public function destroy(Course $course)
    {
        $course->deactivate();
    }
}
