<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome', ['title' => 'Legoland Doetinchem']);
    }

    public function informationPage()
    {
        return view('information',  ['title' => 'Informatie']);
    }

    public function ticketsPage()
    {
        return view('tickets', ['title' => 'Tickets', 'tickets' => Ticket::all()]);
    }

    public function cartPage()
    {
        return view('cart', ['title' => 'Winkelmandje', 'products' => (new \App\Models\Ticket)->getSelectedTickets(), 'amount' => (new \App\Models\Ticket)->getTicketAmounts()]);
    }

    public function checkoutPage()
    {
        return view('checkout', ['title' => 'Afrekenen', 'products' => (new \App\Models\Ticket)->getSelectedTickets(), 'amount' => (new \App\Models\Ticket)->getTicketAmounts()]);
    }

    public function completePage(Order $order)
    {
        return view('complete', ['title' => 'Betaling voldaan', 'order' => $order]);
    }

    public function ticketdetailPage(Request $request, Ticket $ticket)
    {
        return view('ticketdetails',  ['post' => $ticket]);
    }

    public function contactPage()
    {
        return view('contact', ['title' => 'Contact']);
    }

    public function newsPage()
    {
        return view('newsletter', ['title' => 'Nieuwsbrief']);
    }
}
