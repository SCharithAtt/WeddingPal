<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\VendorRegisterController;
use App\Http\Controllers\Auth\ClientRegisterController;
use App\Http\Middleware\RoleGuard;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::get('/register/vendor', [VendorRegisterController::class, 'showRegistrationForm'])->name('vendor.register');
Route::post('/register/vendor', [VendorRegisterController::class, 'register']);

Route::get('/register/client', [ClientRegisterController::class, 'showRegistrationForm'])->name('client.register');
Route::post('/register/client', [ClientRegisterController::class, 'register']);



Route::get('/vendor/dashboard', function () {
    return Inertia::render('Dashboard/VendorDashboard');
})->middleware(['auth', RoleGuard::class . ':Vendor'])->name('vendor.dashboard');

Route::get('/client/dashboard', function () {
    return Inertia::render('Dashboard/ClientDashboard');
})->middleware(['auth', RoleGuard::class . ':Client'])->name('client.dashboard');
