<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollaboratorsController extends Controller
{
    public function create(User $collaborator)
    {
        return view('dashboard.collaborators.create', compact('collaborator'));
    }

    public function store()
    {
        tap(User::make(request()->all()))
            ->setAttribute('is_collaborator', true)
            ->save();
    }
}
