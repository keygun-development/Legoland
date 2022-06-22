<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MollieWebhookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsletterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'index']);

Route::get('/informatie', [PageController::class, 'informationPage']);

Route::get('/tickets', [PageController::class, 'ticketsPage']);

Route::get('/cart', [PageController::class, 'cartPage']);

Route::get('/betalen', [PageController::class, 'checkoutPage']);

Route::get('/inloggen', [PageController::class, 'loginPage'])->name('inloggen');

Route::post('/inloggen/register', [UserController::class, 'register']);

Route::post('/inloggen/login', [UserController::class, 'login']);

Route::get('/attracties', [PageController::class, 'attractionPage']);

Route::get('/account/dashboard', [PageController::class, 'accountDashboardPage'])->middleware('auth');

Route::get('/account/orders', [PageController::class, 'accountOrdersPage'])->middleware('auth');

Route::get('/account/orders/{order:mollie_order_id}', [PageController::class, 'accountOrderDetailPage'])->middleware('auth');

Route::get('/account/settings', [PageController::class, 'accountSettingsPage'])->middleware('auth');

Route::get('/account/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/tickets/{ticket:id}', [PageController::class, 'ticketdetailPage']);

Route::get('/nieuwsbrief', [PageController::class, 'newsPage']);

Route::post('/nieuwsbrief/send', [NewsletterController::class, 'store']);

Route::post('/account/settings/update', [UserController::class, 'updateUser']);

Route::get('/contact', [PageController::class, 'contactPage']);

Route::post('/contact/send', [ContactController::class, 'store']);

Route::get('/accommodation', [PageController::class, 'accommodationPage']);

Route::get('/admin/dashboard', [PageController::class, 'adminDashboardPage'])->middleware('roleChecker');

Route::get(' /admin/tickets', [PageController::class, 'adminTicketPage'])->middleware('roleChecker');

Route::get(' /admin/accounts', [PageController::class, 'adminAccountPage'])->middleware('roleChecker');

Route::get(' /admin/accommodaties', [PageController::class, 'adminAccommodationPage'])->middleware('roleChecker');

Route::get(' /admin/attracties', [PageController::class, 'adminAttractionPage'])->middleware('roleChecker');

Route::get(' /admin/bestellingen', [PageController::class, 'adminOrdersPage'])->middleware('roleChecker');

Route::get('/payments/webhook/', [MollieWebhookController::class => 'handle'])->name('/payments/webhook/');

Route::post('/betalen/send', [MollieWebhookController::class, 'checkout'])->name('/betalen/send');

Route::get('/order', [PageController::class, 'completePage']);

Route::get('/attracties/{attraction:id}', [PageController::class, 'attractiondetailPage']);

Route::get('/accommodations/{accommodation:id}', [PageController::class, 'accommodationdetailPage']);

Route::post('/admin/tickets/{ticket:id}/update', [TicketController::class, 'update'])->name('/admin/tickets/update');

Route::post('/admin/tickets/new', [TicketController::class, 'new'])->name('/admin/tickets/new');

Route::get('/admin/tickets/{ticket:id}/delete', [TicketController::class, 'delete'])->where('id', '{ticket:id}')->name('/admin/tickets/delete');

Route::post('/admin/bestellingen/{order:id}/update', [OrderController::class, 'update'])->name('/admin/bestellingen/update');

Route::post('/admin/bestellingen/new', [OrderController::class, 'new'])->name('/admin/bestellingen/new');

Route::get('/admin/bestellingen/{order:id}/delete', [OrderController::class, 'delete'])->where('id', '{order:id}')->name('/admin/bestellingen/delete');

Route::post('/admin/attracties/{attraction:id}/update', [AttractionController::class, 'update'])->name('/admin/attracties/update');

Route::post('/admin/attracties/new', [AttractionController::class, 'new'])->name('/admin/attracties/new');

Route::get('/admin/attracties/{attraction:id}/delete', [AttractionController::class, 'delete'])->where('id', '{attraction:id}')->name('/admin/attracties/delete');

Route::post('/admin/accommodaties/{accommodation:id}/update', [AccommodationController::class, 'update'])->name('/admin/accommodaties/update');

Route::post('/admin/accommodaties/new', [AccommodationController::class, 'new'])->name('/admin/accommodaties/new');

Route::get('/admin/accommodaties/{accommodation:id}/delete', [AccommodationController::class, 'delete'])->where('id', '{accommodation:id}')->name('/admin/accommodaties/delete');

