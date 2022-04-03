<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        if (!$request->filled('name') || !$request->filled('email')) {
            return redirect('/nieuwsbrief')->with('error', 'Geef uw naam en email op.');
        } else {
            $newNewsletter = new Newsletter();
            $newNewsletter->name = $request->name;
            $newNewsletter->email = $request->email;
            $newNewsletter->save();
            return redirect('/nieuwsbrief')->with('success', 'Bedankt voor uw inschrijving.');
        }
    }
}
