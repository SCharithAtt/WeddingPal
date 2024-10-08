<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\VendorRegisterController;
use App\Http\Controllers\Auth\ClientRegisterController;
use App\Http\Middleware\RoleGuard;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\VendorDashboardController;
use App\Http\Controllers\ClientDashboardController;

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



Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', RoleGuard::class . ':Vendor|Client|Admin'])->name('dashboard');

//Resource routes for VendorController
Route::resource('vendor', VendorController::class)->middleware(['auth', RoleGuard::class . ':Vendor']);

Route::get('/example', [ExampleController::class,'index' ])->name('example');


//Vendor Dashboard routes
Route::middleware(['auth', RoleGuard::class . ':Vendor'])->group(function () {
    Route::get('/dashboard/my-store', [VendorDashboardController::class, 'myStore'])->name('vendor.my-store');
    Route::get('/dashboard/undertakings', [VendorDashboardController::class, 'undertakings'])->name('vendor.undertakings');
    Route::get('/dashboard/vendor-communications', [VendorDashboardController::class, 'communications'])->name('vendor.communications');
    Route::get('/dashboard/enquiries', [VendorDashboardController::class, 'enquiries'])->name('vendor.enquiries');
    Route::get('/dashboard/calendar', [VendorDashboardController::class, 'calendar'])->name('vendor.calendar');
});

//Client Dashboard routes
Route::middleware(['auth', RoleGuard::class . ':Client'])->group(function () {
    Route::get('/dashboard/my-wedding', [ClientDashboardController::class, 'myWedding'])->name('client.wedding');
    Route::get('/dashboard/client-communications', [ClientDashboardController::class, 'communications'])->name('client.communications');
    Route::get('/dashboard/marketplace', [ClientDashboardController::class, 'market'])->name('client.market');
    Route::get('/dashboard/vendor-contracts', [ClientDashboardController::class, 'vendorContracts'])->name('client.contracts');
    Route::get('/dashboard/disputes', [ClientDashboardController::class, 'disputes'])->name('client.disputes');
    Route::get('/dashboard/wedding-checklist', [ClientDashboardController::class, 'weddingChecklist'])->name('client.checklist');
});

