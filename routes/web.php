<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





Route::get('/',[TicketController::class,'index']);
Route::get('/tickets/create',[TicketController::class,'create']);

Route::post('/tickets',[TicketController::class,'store']);

Route::get('/tickets/{ticket}',[TicketController::class,'show']);


//Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/tickets/{ticket}/response',[TicketController::class,'respond']);

    // Route::get('/tickets/{ticket}/close',[TicketController::class,'close']);

    Route::post('/tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');

  
//});