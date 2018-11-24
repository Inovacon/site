<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactMessage;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'body' => 'required'
        ]);

        ContactMessage::create(
            $request->only('full_name', 'email', 'body')
        );

        return response([], 204);
    }
}
