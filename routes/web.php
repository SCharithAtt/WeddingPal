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
use App\Http\Controllers\EventController;
use App\Http\Controllers\WeddingController;
use App\Http\Controllers\ContractController;


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

Route::get('vendor/show/{vendor}', [VendorController::class, 'show'])->name('vendor.show')->middleware(['auth', RoleGuard::class . ':Client']);

Route::middleware(['auth', RoleGuard::class . ':Vendor'])->group(function () {
    Route::get('/events', [EventController::class, 'index']);
    Route::post('/events', [EventController::class, 'store']);
});


Route::middleware(['auth', RoleGuard::class . ':Vendor'])->group(function () {



    // Contracts
    Route::get('vendor/contracts', [ContractController::class, 'index'])->name('vendor.contracts.index');
    Route::get('vendor/contracts/create', [ContractController::class, 'create'])->name('vendor.contracts.create');
    Route::post('vendor/contracts', [ContractController::class, 'store'])->name('vendor.contracts.store');
    Route::get('vendor/contracts/{id}', [ContractController::class, 'show'])->name('vendor.contracts.show');
    Route::get('vendor/contracts/{id}/edit', [ContractController::class, 'edit'])->name('vendor.contracts.edit');
    Route::put('vendor/contracts/{id}', [ContractController::class, 'update'])->name('vendor.contracts.update');
    Route::delete('vendor/contracts/{id}', [ContractController::class, 'destroy'])->name('vendor.contracts.destroy');

});


Route::middleware(['auth', RoleGuard::class . ':Client'])->group(function () {
    // Weddings
    Route::resource('wedding', WeddingController::class);
    // Contracts
    Route::resource('contracts', ContractController::class)->only([
        'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
    ]);
});

Route::resource('contracts', ContractController::class);


Route::get('/chat/{friend}', function (User $friend) {
    return view('chat', [
        'friend' => $friend
    ]);
})->middleware(['auth'])->name('chat');


Route::get('/messages/{friend}', function (User $friend) {
    return ChatMessage::query()
        ->where(function ($query) use ($friend) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $friend->id);
        })
        ->orWhere(function ($query) use ($friend) {
            $query->where('sender_id', $friend->id)
                ->where('receiver_id', auth()->id());
        })
        ->with(['sender', 'receiver'])
        ->orderBy('id', 'asc')
        ->get();
})->middleware(['auth']);


Route::post('/messages/{friend}', function (User $friend) {
    $message = ChatMessage::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $friend->id,
        'text' => request()->input('message')
    ]);

    broadcast(new MessageSent($message));

    return $message;
});
