<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseActivationController extends Controller
{
    public function store(Course $course)
    {
        abort_unless(
            $course->teams()->exists(),
            423,
            'O curso deve possuir ao menos uma turma para que possa ser ativado.'
        );

        $course->activate();
    }

    public function destroy(Course $course)
    {
        $course->deactivate();
    }
}
