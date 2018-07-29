<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    public function store(CourseRequest $request)
    {
        Course::create(
            $request->only(array_keys($request->rules()))
        );

        return back();
    }
}
