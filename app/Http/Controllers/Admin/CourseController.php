<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Course;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $viewData = array_merge($this->getCategories(), [
            'course' => app(Course::class),
            'courses' => Course::with('occupationArea')->latest()->paginate(20)
        ]);

        return view('dashboard.courses.index', $viewData);
    }

    public function show(Course $course)
    {
        $viewData = array_merge($this->getCategories(), [
            'course' => $course,
            'team' => app(Team::class),
            'teams' => $course->teams
        ]);

        return view('dashboard.courses.show', $viewData);
    }

    public function create(Course $course)
    {
        return view('dashboard.courses.create',
            array_merge(compact('course'), $this->getCategories())
        );
    }

    public function store(CourseRequest $request)
    {
        $course = Course::create($request->getAll());

        return redirect()->route('dashboard.courses.show', $course)->with(
            'flash', 'Curso cadastrado com sucesso.'
        );
    }

    public function edit(Course $course)
    {
        return view('dashboard.courses.edit',
            array_merge(compact('course'), $this->getCategories())
        );
    }

    public function update(CourseRequest $request, Course $course)
    {
        if ($request->hasFile('image_path')) {
            Storage::disk('public')->delete($course->image_path);
        }

        $course->update($request->getAll());

        return redirect()->route('dashboard.courses.show', $course)->with(
            'flash', 'Curso editado com sucesso.'
        );
    }

    protected function getCategories()
    {
        return [
            'courseTypes' => Category::courseType()->get(),
            'modalities' => Category::modality()->get(),
            'occupationAreas' => Category::occupationArea()->get(),
            'targetAudiences' => Category::targetAudience()->get(),
        ];
    }
}
