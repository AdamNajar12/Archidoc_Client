<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\StatutController;
use App\Http\Controllers\Type_interventions;
use App\Http\Controllers\UtilisateurController;
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
Route::get('/clients/{client}/applications', [ClientController::class, 'ShowApplications_for_Clients'])->name('clients.applications');


Route::get('/Applications', [ApplicationController::class, 'showApplications'])->name('Applications.index');
Route::get('/Applications/create', [ApplicationController::class, 'create'])->name('Applications.create');
Route::post('/Applications', [ApplicationController::class, 'store'])->name('Applications.store');
Route::get('/Applications/{Application}/edit', [ApplicationController::class, 'edit'])->name('Applications.edit');
Route::put('/Applications/{Application}', [ApplicationController::class, 'update'])->name('Applications.update');
Route::delete('/Applications/{Application}', [ApplicationController::class, 'destroy'])->name('Applications.destroy');


Route::get('/tickets', [TicketController::class, 'showTickets'])->name('ticket.index');
Route::get('/tickets/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('ticket.store');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('ticket.update');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy');

Route::get('/statuts', [StatutController::class, 'showStatuts'])->name('statuts.index');
Route::get('/statuts/create', [StatutController::class, 'create'])->name('statuts.create');
Route::post('/statuts', [StatutController::class, 'store'])->name('statuts.store');
Route::get('/statuts/{statut}/edit', [StatutController::class, 'edit'])->name('statuts.edit');
Route::put('/statuts/{statut}', [StatutController::class, 'update'])->name('statuts.update');
Route::delete('/statuts/{statut}', [StatutController::class, 'destroy'])->name('statuts.destroy');

Route::get('/type_interventions', [Type_interventions ::class, 'showType_d_interventions'])->name('type_intervention.index');
Route::get('/type_interventions/create', [Type_interventions ::class, 'create'])->name('type_intervention.create');
Route::post('/type_interventions', [Type_interventions ::class, 'store'])->name('type_intervention.store');
Route::get('/type_interventions/{type_intervention}/edit', [Type_interventions::class, 'edit'])->name('type_intervention.edit');
Route::put('/type_interventions/{type_intervention}', [Type_interventions::class, 'update'])->name('type_intervention.update');
Route::delete('/type_interventions/{type_intervention}', [Type_interventions::class, 'destroy'])->name('type_intervention.destroy');

Route::get('/users', [UtilisateurController ::class, 'showUsers'])->name('users.index');
Route::get('/users/create', [UtilisateurController ::class, 'create'])->name('users.create');
Route::post('/users', [UtilisateurController ::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UtilisateurController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UtilisateurController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UtilisateurController::class, 'destroy'])->name('users.destroy');






Route::get('/Admin', function () {
    return view('layouts.dashboard_Admin');
})->middleware(['auth', 'verified'])->name('Admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/Admin', function () {
    return view('layouts.dashboard_Admin');
});

require __DIR__.'/auth.php';
