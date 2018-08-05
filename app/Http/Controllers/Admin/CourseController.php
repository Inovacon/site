<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function create()
    {
        return view('dashboard.courses.create', [
            'courseTypes' => Category::where('type', 'course_type')->get(),
            'modalities' => Category::where('type', 'modality')->get(),
            'shifts' => Category::where('type', 'shift')->get(),
            'occupationAreas' => Category::where('type', 'occupation_area')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'target_audience' => 'required',
            'price' => 'required',
            'minimum_students' => 'required',
            'maximum_students' => 'required',
            'hours' => 'required',
            'course_type_id' => 'required',
            'modality_id' => 'required',
            'shift_id' => 'required',
            'occupation_area_id' => 'required',
        ]);

        Course::create($request->all());

        return back();
    }
}
