<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function contacts()
    {
        return view('contacts');
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate([
            "full_name" => "required",
            "email" => "required |email",
            "message" => "required",
        ]);

        Mail::to('admin@test.com')->send(new ContactFormMail($validatedData));

        return redirect()
        ->back()
        ->with('message', 'Email inviata con successo!');
    }
}
