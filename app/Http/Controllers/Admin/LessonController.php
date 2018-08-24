<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function index(Team $team)
    {
        return view('dashboard.lessons.index', [
            'team' => $team,
            'lessons' => $team->lessons()->latest()->paginate(20),
        ]);
    }

    public function show(Team $team, Lesson $lesson)
    {
        return view('dashboard.lessons.show', compact('team', 'lesson'));
    }

    public function create(Team $team, Lesson $lesson)
    {
        return view('dashboard.lessons.create', compact('team', 'lesson'));
    }

    public function store(Request $request, Team $team)
    {
        $request->validate([
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $lesson = $team->lessons()->create(
            $request->only(['date', 'start_time', 'end_time'])
        );

        return redirect()
            ->route('dashboard.courses.lessons.show', [$team, $lesson])
            ->with('flash', 'Aula criada com sucesso.');
    }

    public function edit(Team $team, Lesson $lesson)
    {
        return view('dashboard.lessons.edit', compact('team', 'lesson'));
    }

    public function update(Request $request, $teamId, Lesson $lesson)
    {
        $request->validate([
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $lesson->update($request->only(['date', 'start_time', 'end_time']));

        return redirect()
            ->route('dashboard.courses.lessons.show', [$teamId, $lesson])
            ->with('flash', 'Aula atualizada com sucesso.');
    }

    public function destroy($teamId, Lesson $lesson)
    {
        $lesson->delete();

        return back()->with('flash', 'Aula removida com sucesso.');
    }
}
