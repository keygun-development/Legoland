<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome', ['title' => 'Legoland Doetinchem']);
    }

    public function informationPage(Request $request)
    {
        return view('information',  ['title' => 'Informatie']);
    }

    public function ticketsPage(Request $request)
    {
        return view('tickets', ['title' => 'Tickets', 'tickets' => Ticket::all()]);
    }

    public function cartPage(Request $request)
    {
        return view('cart', ['title' => 'Winkelmandje', 'products' => (new \App\Models\Ticket)->getCurrentTickets()]);
    }

    public function checkoutPage(Request $request)
    {
        return 'Checkout pagina';
    }

    public function ticketdetailPage(Request $request, Ticket $ticket)
    {
        return view('ticketdetails',  ['post' => $ticket]);
    }

    public function contactPage(Request $request)
    {
        return view('contact', ['title' => 'Contact']);
    }

    public function newsPage(Request $request)
    {
        return view('newsletter', ['title' => 'Nieuwsbrief']);
    }
}
