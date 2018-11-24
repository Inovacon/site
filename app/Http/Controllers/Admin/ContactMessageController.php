<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        return view('dashboard.contact-messages.index', [
            'messages' => ContactMessage::latest()->paginate(20)
        ]);
    }

    public function show(ContactMessage $mensagem)
    {
        return view('dashboard.contact-messages.show', [
            'message' => $mensagem
        ]);
    }

    public function destroy(ContactMessage $mensagem)
    {
        $mensagem->delete();

        return redirect()
            ->route('dashboard.contact-messages.index')
            ->with('flash', 'Mensagem removida com sucesso.');
    }
}
