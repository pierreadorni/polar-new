<?php

use App\Http\Controllers\MembersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RentalItemsController;
use App\Http\Controllers\RentalsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hours', function () {
    return view('hours');
});

Route::get('/team', [MembersController::class, 'index'])->name('members.index');

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
// search

Route::get('/services', [RentalItemsController::class, 'index'])->name('rentalItems.index');

Route::get('/services/{rentalItem}', [RentalItemsController::class, 'show'])->name('rentalItems.show')->middleware("cas.auth");
Route::post('/rentals', [RentalsController::class, 'store'])->name('rentals.store');

