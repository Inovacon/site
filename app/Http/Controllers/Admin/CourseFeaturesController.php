<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class CourseFeaturesController extends Controller
{
    public function index(Course $course)
    {
        return $course->{$this->feature()}->map(function ($content, $index) {
            return compact('index', 'content');
        });
    }

    public function store(Request $request, Course $course)
    {
        $request->validate(['name' => 'required']);

        $course->update([
            $this->feature() => $course->{$this->feature()}->push($request->name)
        ]);

        return response([], 201);
    }

    public function update(Request $request, Course $course, $index)
    {
        $request->validate(['name' => 'required']);

        $course->update([
            $this->feature() => tap($course->{$this->feature()})->splice($index, 1, $request->name)
        ]);

        return response([], 204);
    }

    public function destroy(Course $course, $index)
    {
        $course->update([
            $this->feature() => tap($course->{$this->feature()})->splice($index, 1)
        ]);

        return response([], 204);
    }

    abstract protected function feature();
}
