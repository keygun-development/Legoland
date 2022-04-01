<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $newNewsletter = new Newsletter();
        $newNewsletter->name = $request->name;
        $newNewsletter->email = $request->email;
        $newNewsletter->save();
        return redirect('/nieuwsbrief')->with('message', 'Bedankt voor uw inschrijving.');
    }
}
