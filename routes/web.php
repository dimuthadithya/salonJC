<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin routes
    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        // Bookings routes
        Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
        Route::get('/bookings/{booking}', [AdminController::class, 'showBooking'])->name('admin.bookings.show');
        Route::put('/bookings/{booking}/status', [AdminController::class, 'updateBookingStatus'])->name('admin.bookings.update-status');

        // Services routes
        Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
        Route::get('/services/create', [AdminController::class, 'createService'])->name('admin.services.create');
        Route::post('/services', [AdminController::class, 'storeService'])->name('admin.services.store');
        Route::get('/services/{service}/edit', [AdminController::class, 'editService'])->name('admin.services.edit');
        Route::put('/services/{service}', [AdminController::class, 'updateService'])->name('admin.services.update');
        Route::delete('/services/{service}', [AdminController::class, 'destroyService'])->name('admin.services.destroy');

        // Categories routes
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    // Booking routes
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    // Payment routes
    Route::get('/booking/{id}/payment', [BookingController::class, 'showPayment'])->name('booking.payment');
    Route::post('/booking/{id}/payment', [BookingController::class, 'processPayment'])->name('booking.payment.process');
    Route::get('/booking/{id}/payment/success', [BookingController::class, 'paymentSuccess'])->name('booking.payment.success');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
