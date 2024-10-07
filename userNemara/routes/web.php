<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('home');
});

Route::get('/treatments', function () {
    return view('treatments');
});

// Reservation routes
Route::get('/reservation', [BookingController::class, 'showReservationForm'])->name('reservation');
Route::post('/booking/consultation', [BookingController::class, 'storeConsultation'])->name('booking.consultation');
Route::post('/booking/treatment', [BookingController::class, 'storeTreatment'])->name('booking.treatment');

// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products/add', [ProductController::class, 'addToCart'])->name('products.add');
Route::post('/products/remove', [ProductController::class, 'removeFromCart'])->name('products.remove');

Route::get('/products', [ProductController::class, 'showProducts'])->name('products.index');
// Route to save order and reduce stock
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

// Route to import products from CSV
Route::get('/products/import', [ProductController::class, 'importProductsFromCSV'])->name('products.import');
