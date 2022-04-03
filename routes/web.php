<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MollieWebhookController;
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

Route::get('/tickets/{ticket:id}', [PageController::class, 'ticketdetailPage']);

Route::get('/nieuwsbrief', [PageController::class, 'newsPage']);

Route::post('/nieuwsbrief/send', [NewsletterController::class, 'store']);

Route::get('/contact', [PageController::class, 'contactPage']);

Route::post('/contact/send', [ContactController::class, 'store']);

Route::get('/order', [PageController::class, 'completePage']);

Route::get('payment-success',[MollieWebhookController::Class, 'handle'])->name('payment.success');

Route::post('mollie-payment',[MollieWebhookController::Class, 'checkout'])->name('mollie.payment');
