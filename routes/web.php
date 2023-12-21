<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/trip/form', [TicketController::class, 'showForm'])->name('trip.form');
Route::post('/trip/store', [TicketController::class, 'storeTrip']);
Route::get('/trip/seats', [TicketController::class, 'showAvailableSeats']);
Route::post('/trip/purchase', [TicketController::class, 'purchaseTicket']);
