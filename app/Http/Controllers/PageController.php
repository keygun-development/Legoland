<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Attraction;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

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

    public function attractiePage()
    {
        return view('attractiesOverview',  ['title' => 'Attracties']);
    }

    public function loginPage()
    {
        return view('login');
    }

    public function ticketsPage()
    {
        return view('tickets', ['title' => 'Tickets', 'tickets' => Ticket::all()]);
    }

    public function accountDashboardPage()
    {
        return view('account.dashboard', ['title' => 'Dashboard']);
    }

    public function accountOrdersPage(OrderController $orderController)
    {
        return view('account.orders', ['title' => 'Bestellingen', 'orders' => $orderController->getUserOrders()]);
    }

    public function accountSettingsPage(UserController $user)
    {
        return view('account.settings', ['title' => 'Mijn gegevens', 'user' => (new \App\Models\User)->findOrFail(Auth::id())]);
    }

    public function accountOrderDetailPage(Order $order)
    {
        return view('orderdetail',  ['order' => $order]);
    }

    public function cartPage(Ticket $ticket)
    {
        return view('cart', ['title' => 'Winkelmandje', 'products' => $ticket->getSelectedTickets(), 'amount' => $ticket->getTicketAmounts()]);
    }

    public function checkoutPage(Ticket $ticket)
    {
        return view('checkout', ['title' => 'Afrekenen', 'products' => $ticket->getSelectedTickets(), 'amount' => $ticket->getTicketAmounts()]);
    }

    public function completePage(MollieWebhookController $order)
    {
        return view('complete', ['title' => 'Betaling voldaan', 'order' => $order->handle()]);
    }

    public function ticketdetailPage(Ticket $ticket)
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

    public function attractiondetailPage(Attraction $attraction)
    {
        return view('attractiondetails', ['title' => 'Attractie details', 'attraction' => $attraction]);
    }

    public function accommodationPage()
    {
        return view('accommodation', ['title' => 'Accommodatie', 'accommodations' => Accommodation::all()]);
    }
}
