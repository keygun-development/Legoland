<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        dd('test');
        $newContact = new Contact();
        $newContact->name = $request->name;
        $newContact->email = $request->email;
        $newContact->message = $request->message;
        $newContact->save();
        return redirect('/contact')->with('message', 'Bedankt voor uw bericht.');
    }
}
