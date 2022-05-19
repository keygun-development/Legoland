<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\MollieWebhookController;
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

Route::get('/inloggen', [PageController::class, 'loginPage']);

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

Route::get('/payments/webhook/', [MollieWebhookController::class => 'handle'])->name('/payments/webhook/');
Route::get('/accommodation', [PageController::class, 'accommodationPage']);

Route::post('/betalen/send', [MollieWebhookController::class, 'checkout'])->name('/betalen/send');

Route::get('/order', [PageController::class, 'completePage']);

Route::get('/attracties/{attraction:id}', [PageController::class, 'attractiondetailPage']);
