<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Course $course)
    {
        return view('dashboard.teams.index', [
            'course' => $course,
            'teams' => $course->teams()->paginate(20),
        ]);
    }

    public function show(Course $course, Team $team)
    {
        return view('dashboard.teams.show', compact('course', 'team'));
    }

    public function create(Course $course, Team $team)
    {
        return view('dashboard.teams.create', compact('course', 'team'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'minimum_students' => 'required',
            'maximum_students' => 'required',
        ]);

        $times = abs($request->times) ?: 1;

        while ($times--) {
            $course->teams()->create(
                $request->only(['minimum_students', 'maximum_students'])
            );
        }

        return back()->with('flash', 'Turma(s) criadas com sucesso.');
    }

    public function edit(Course $course, Team $team)
    {
        return view('dashboard.teams.edit', compact('course', 'team'));
    }

    public function update(Request $request, $courseId, Team $team)
    {
        $request->validate([
            'minimum_students' => 'required',
            'maximum_students' => 'required',
        ]);

        $team->update($request->only('minimum_students', 'maximum_students'));

        return back()->with('flash', 'Turma atualizada com sucesso.');
    }
}
