<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/points/use', [ProfileController::class, 'usePoints'])->name('points.use');
});

Route::middleware('auth')->group(function (){
Route::get('/festival', [FestivalController::class, 'index'])->name('festival.index');
Route::get('/festival/create', [FestivalController::class, 'create'])->name('festival.create');
Route::post('/festival', [FestivalController::class, 'store'])->name('festival.store');
Route::get('/festival/{festival}', [FestivalController::class, 'show'])->name('festival.show');
});

Route::middleware('auth')->group(function (){
Route::get('/trip/{festival}', [TripController::class, 'index'])->name('trip.index');
Route::get('/trip/{festival}/create', [TripController::class, 'create'])->name('trip.create');
Route::post('/trip/{festival}/store', [TripController::class, 'store'])->name('trip.store');
Route::get('/trip/{trip}/show', [TripController::class, 'show'])->name('trip.show');
Route::post('/trip/{trip}/book', [TripController::class, 'book'])->name('trip.book');
});
require __DIR__.'/auth.php';

