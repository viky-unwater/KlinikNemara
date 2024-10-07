<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Admin login route
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Admin dashboard (only accessible after login)
Route::middleware('auth:admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


// Admin dashboard route
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Other sections
Route::get('/admin/users', function () {
    return view('admin.manage_users'); // Create this view
})->name('admin.manage_users');

Route::get('/admin/staff', function () {
    return view('admin.manage_staff'); // Create this view
})->name('admin.manage_staff');

Route::get('/admin/treatments', function () {
    return view('admin.manage_treatments'); // Create this view
})->name('admin.manage_treatments');

Route::get('/admin/reservations', function () {
    return view('admin.manage_reservations'); // Create this view
})->name('admin.manage_reservations');

Route::get('/admin/consultations', function () {
    return view('admin.manage_consultations'); // Create this view
})->name('admin.manage_consultations');

Route::get('/admin/products', function () {
    return view('admin.manage_products'); // Create this view
})->name('admin.manage_products');

Route::get('/admin/orders', function () { 
    return view('admin.orders.manage'); // Ini mengarahkan ke orders/manage.blade.php
})->name('admin.manage_orders');


// Grouping routes under the admin prefix
Route::prefix('admin/products')->name('admin.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('manage_products'); // Route to manage products
    Route::get('/create', [ProductController::class, 'create'])->name('create_product'); // Create product
    Route::post('/', [ProductController::class, 'store'])->name('store_product'); // Store product
    Route::get('/{id}', [ProductController::class, 'show'])->name('show_product'); // Show product detail
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit_product'); // Edit product
    Route::put('/{id}', [ProductController::class, 'update'])->name('update_product'); // Update product
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('delete_product'); // Delete product
});

Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.manage_orders');
Route::post('/admin/orders/{id}/accept', [OrderController::class, 'acceptOrder'])->name('admin.accept_order');


// Route for managing services (treatments)
Route::get('/admin/treatments', [ServiceController::class, 'index'])->name('admin.manage_treatments');
// Route for managing reservations (treatments)
Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('admin.manage_reservations');

// Route for completing a reservation
Route::post('/admin/reservations/{id}/complete', [ReservationController::class, 'completeReservation'])->name('admin.complete_reservation');

// Route untuk menampilkan halaman konsultasi
Route::get('/admin/consultations', [ConsultationController::class, 'index'])->name('admin.manage_consultations');

// Route untuk memperbarui status konsultasi
Route::post('/consultations/{id}/update-status', [ConsultationController::class, 'updateStatus'])->name('consultations.update_status');

// Routes for staff management
Route::prefix('admin')->group(function () {
    Route::get('/staff', [StaffController::class, 'index'])->name('admin.manage_staff');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('admin.create_staff');
    Route::post('/staff', [StaffController::class, 'store'])->name('admin.store_staff');
    Route::get('/staff/{id}', [StaffController::class, 'show'])->name('admin.show_staff');
    Route::get('/staff/{id}/edit', [StaffController::class, 'edit'])->name('admin.edit_staff');
    Route::put('/staff/{id}', [StaffController::class, 'update'])->name('admin.update_staff');
    Route::delete('/staff/{id}', [StaffController::class, 'destroy'])->name('admin.delete_staff');
});

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.manage_users');