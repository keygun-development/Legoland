<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome', ['name' => 'Keagan']);
    }

    public function informationPage(Request $request)
    {
        return 'Informatie pagina';
    }

    public function orderPage(Request $request)
    {
        return 'Bestel pagina';
    }

    public function contactPage(Request $request)
    {
        return 'Contact pagina';
    }

    public function newsPage(Request $request)
    {
        return 'Nieuwsbrief pagina';
    }
}
