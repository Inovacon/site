<?php

namespace App\Http\Controllers\User;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
    	return view('user.my-courses.index');
    }

    public function show(Course $course)
    {
    	$team = \App\Team::where('course_id', $course->id)->first();
    	$lessons = \App\Lesson::where('team_id', $team->id)->get();

    	return view('user.my-courses.show', compact('course', 'lessons'));
    }
}
