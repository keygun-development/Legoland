<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/tickets', [PageController::class, 'orderPage']);

Route::get('/nieuwsbrief', [PageController::class, 'newsPage']);

Route::get('/contact', [PageController::class, 'contactPage']);
