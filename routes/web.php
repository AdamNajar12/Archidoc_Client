<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

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

Route::get('/clients', [ClientController::class, 'showClients'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

Route::get('/Applications', [ApplicationController::class, 'showApplications'])->name('Applications.index');
Route::get('/Applications/create', [ApplicationController::class, 'create'])->name('Applications.create');
Route::post('/Applications', [ApplicationController::class, 'store'])->name('Applications.store');
Route::get('/Applications/{Application}/edit', [ApplicationController::class, 'edit'])->name('Applications.edit');
Route::put('/Applications/{Application}', [ApplicationController::class, 'update'])->name('Applications.update');
Route::delete('/Applications/{Application}', [ApplicationController::class, 'destroy'])->name('Applications.destroy');


Route::get('/Admin', function () {
    return view('layouts.dashboard_Admin');
})->middleware(['auth', 'verified'])->name('Admin   ');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/Admin', function () {
    return view('layouts.dashboard_Admin');
});
require __DIR__.'/auth.php';
