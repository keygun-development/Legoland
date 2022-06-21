<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Attraction;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\Cart;
use Illuminate\Contracts\Console\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Mollie\Api\Exceptions\ApiException;

class PageController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('welcome', ['title' => 'Legoland Doetinchem']);
    }

    public function informationPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('information',  ['title' => 'Informatie']);
    }

    public function attractionPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('attractionOverview',  ['title' => 'Attracties', 'attractions' => Attraction::all()]);
    }

    public function loginPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('login');
    }

    public function ticketsPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('tickets', ['title' => 'Tickets', 'tickets' => Ticket::all()]);
    }

    public function accountDashboardPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('account.dashboard', ['title' => 'Dashboard']);
    }

    public function accountOrdersPage(OrderController $orderController): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('account.orders', ['title' => 'Bestellingen', 'orders' => $orderController->getUserOrders()]);
    }

    public function accountSettingsPage(UserController $user): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('account.settings', ['title' => 'Mijn gegevens', 'user' => (new \App\Models\User)->findOrFail(Auth::id())]);
    }

    public function accountOrderDetailPage(Order $order): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('orderdetail',  ['order' => $order]);
    }

    public function cartPage(Cart $cart): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('cart', ['title' => 'Winkelmandje', 'products' => $cart->getSelectedProducts(), 'amount' => $cart->getProductAmounts()]);
    }

    public function checkoutPage(Cart $cart): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('checkout', ['title' => 'Afrekenen', 'products' => $cart->getSelectedProducts(), 'amount' => $cart->getProductAmounts()]);
    }

    /**
     * @throws ApiException
     */
    public function completePage(MollieWebhookController $order): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('complete', ['title' => 'Betaling voldaan', 'order' => $order->handle()]);
    }

    public function ticketdetailPage(Ticket $ticket): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('ticketdetails',  ['post' => $ticket]);
    }

    public function contactPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('contact', ['title' => 'Contact']);
    }

    public function newsPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('newsletter', ['title' => 'Nieuwsbrief']);
    }

    public function adminTicketPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin-tickets', ['title' => 'Admin Tickets']);
    }
    public function adminAccountPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin-account', ['title' => 'Admin Accounts']);
    }
    public function adminAccommodationPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin-accomodaties', ['title' => 'Admin Accomodaties']);
    }
    public function adminAttractionPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin-attracties', ['title' => 'Admin Actracties']);
    }

    public function attractiondetailPage(Attraction $attraction): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('attractiondetails', ['title' => 'Attractie details', 'attraction' => $attraction]);
    }

    public function accommodationPage(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('accommodation', ['title' => 'Accommodatie', 'accommodations' => Accommodation::all()]);
    }

    public function accommodationdetailPage(Accommodation $accommodation): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('accommodationdetails', ['title' => 'Accommodatie details', 'accommodation' => $accommodation]);
    }
}
