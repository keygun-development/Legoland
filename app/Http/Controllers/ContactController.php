<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('email') || !$request->filled('message')) {
            return redirect('/contact')->with('error', 'Geef uw naam email en bericht op.');
        } else {
            $newContact = new Contact();
            $newContact->name = $request->name;
            $newContact->email = $request->email;
            $newContact->message = $request->message;
            $newContact->save();
            return redirect('/contact')->with('success', 'Bedankt voor uw bericht.');
        }
    }
}
