<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollaboratorController extends Controller
{
    public function index()
    {
        return view('dashboard.collaborators.index', [
            'collaborator' => app(User::class),
            'collaborators' => User::collaborator()->paginate(20)
        ]);
    }

    public function create(User $collaborator)
    {
        return view('dashboard.collaborators.create', compact('collaborator'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::createCollaborator(
            $request->only('name', 'email', 'password')
        );

        return redirect()
            ->route('dashboard.collaborators.index')
            ->with('flash', 'Colaborador cadastrado com sucesso.');
    }

    public function promote(User $collaborator)
    {
        abort_unless(auth()->user()->isAdmin(), 403, 'Você não tem autorização para isso.');

        $collaborator->attachRole('admin');

        return back()->with('flash', 'Colaborador promovido a administrador.');
    }
}
