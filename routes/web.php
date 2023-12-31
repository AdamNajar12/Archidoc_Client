<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\StatutController;
use App\Http\Controllers\Type_interventions;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\Traitement_Controller ;
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
Route::get('/clients/{client}/details', [ClientController::class, 'ShowDetails'])->name('clients.details');
Route::put('/clients/{client}/restore', [ClientController::class, 'restore'])->name('clients.restore');


Route::get('/Applications', [ApplicationController::class, 'showApplications'])->name('Applications.index');
Route::get('/Applications/create', [ApplicationController::class, 'create'])->name('Applications.create');
Route::post('/Applications', [ApplicationController::class, 'store'])->name('Applications.store');
Route::get('/Applications/{Application}/edit', [ApplicationController::class, 'edit'])->name('Applications.edit');
Route::put('/Applications/{Application}', [ApplicationController::class, 'update'])->name('Applications.update');
Route::delete('/Applications/{Application}', [ApplicationController::class, 'destroy'])->name('Applications.destroy');
Route::get('/Applications/{Application}/details', [ApplicationController::class, 'showDetails'])->name('Applications.details');
Route::put('/Applications/{Application}/restore', [ApplicationController::class, 'restore'])->name('Applications.restore');




Route::get('/tickets', [TicketController::class, 'showTickets'])->name('ticket.index');
Route::get('/tickets/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('ticket.store');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('ticket.update');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy');
Route::get('/get-applications/{client}', [TicketController::class, 'getApplicationsForClient']);
Route::get('/tickets/{ticket}/details', [TicketController::class, 'showDetails'])->name('tickets.details');
Route::get('/tickets/AddFront', [TicketController::class, 'AddTicketFront'])->name('ticket.addFront');
Route::post('/tickets/storefront', [TicketController::class, 'storefront'])->name('ticket.storefront');
Route::get('/tickets/indexFront', [TicketController::class, 'showFrontTicket'])->name('ticket.showFront');
Route::put('/tickets/traiterTicket/{ticket}', [TicketController::class, 'TraiterTicketFront'])->name('ticket.traiterFront');
Route::get('/tickets/{ticket}/traiter', [TicketController::class, 'TraiterFront'])->name('ticket.traiter');
Route::put('/tickets/{ticket}/restore', [TicketController::class, 'restore'])->name('ticket.restore');
Route::get('/tickets/PDF', [TicketController::class, 'PDF_Tickets'])->name('ticket.pdf');
Route::get('/tickets/export-tickets', [TicketController::class, 'exportTickets'])->name('ticket.export');
Route::get('/tickets/Tableau_bord', [TicketController::class, 'enCoursTickets'])->name('ticket.tableau_bord');
Route::get('/tickets/charts', [TicketController::class, 'chartsTickets'])->name('ticket.charts');
Route::get('/tickets/satitistiquesFront', [TicketController::class, 'chartsTicketsFront'])->name('ticket.chartsFront');


Route::get('/statuts', [StatutController::class, 'showStatuts'])->name('statuts.index');
Route::get('/statuts/create', [StatutController::class, 'create'])->name('statuts.create');
Route::post('/statuts', [StatutController::class, 'store'])->name('statuts.store');
Route::get('/statuts/{statut}/edit', [StatutController::class, 'edit'])->name('statuts.edit');
Route::put('/statuts/{statut}', [StatutController::class, 'update'])->name('statuts.update');
Route::delete('/statuts/{statut}', [StatutController::class, 'destroy'])->name('statuts.destroy');
Route::get('/statuts/{statut}/details', [StatutController::class, 'showDetails'])->name('statuts.details');
Route::put('/statuts/{statut}/restore', [StatutController::class, 'restore'])->name('statuts.restore');



Route::get('/type_interventions', [Type_interventions ::class, 'showType_d_interventions'])->name('type_intervention.index');
Route::get('/type_interventions/create', [Type_interventions ::class, 'create'])->name('type_intervention.create');
Route::post('/type_interventions', [Type_interventions ::class, 'store'])->name('type_intervention.store');
Route::get('/type_interventions/{type_intervention}/edit', [Type_interventions::class, 'edit'])->name('type_intervention.edit');
Route::put('/type_interventions/{type_intervention}', [Type_interventions::class, 'update'])->name('type_intervention.update');
Route::delete('/type_interventions/{type_intervention}', [Type_interventions::class, 'destroy'])->name('type_intervention.destroy');
Route::get('/type_interventions/{type_intervention}/details', [Type_interventions::class, 'showDetails'])->name('type_intervention.details');
Route::put('/type_interventions/{type_intervention}/restore', [Type_interventions::class, 'restore'])->name('type_intervention.restore');

Route::get('/users', [UtilisateurController ::class, 'showUsers'])->name('users.index');
Route::get('/users/create', [UtilisateurController ::class, 'create'])->name('users.create');
Route::post('/users', [UtilisateurController ::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UtilisateurController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UtilisateurController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UtilisateurController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{user}/details', [UtilisateurController::class, 'showDetails'])->name('users.details');
Route::put('/users/{user}/restore', [UtilisateurController::class, 'restore'])->name('users.restore');
Route::put('/updateProfil', [UtilisateurController::class, 'UpdateProfil'])->name('users.updateProfil');
Route::get('/profilBackCheckFront',  [UtilisateurController::class, 'ConsulterProfilFront'])->name('consulterProfilFront');
Route::put('/updateProfilFront',  [UtilisateurController::class, 'UpdateProfilFront'])->name('users.updateProfilFront');
Route::get('/editProfilFront',  [UtilisateurController::class, 'editProfilFront'])->name('users.editProfilFront');
// routes/web.php

Route::get('/chat/{receiverId?}', [UtilisateurController::class, 'chat'])->name('users.chat');
Route::post('/chat/send', [UtilisateurController::class, 'sendMessage'])->name('users.send');
Route::get('/chatBack/{receiverId?}', [UtilisateurController::class, 'chatBack'])->name('users.chatBack');
Route::post('/chatBack/send', [UtilisateurController::class, 'sendMessageBack'])->name('users.sendBack');
Route::get('/chat/get-new-messages/{lastId}', [UtilisateurController::class, 'getNewMessages'])->name('chat.get-new-messages');


Route::get('/traitements', [Traitement_Controller::class, 'ShowListTraitements'])->name('traitement.index');
Route::get('/traitements/{traitement}/details', [Traitement_Controller::class, 'ShowDetails'])->name('traitement.details');



Route::get('/Admin', function () {
    return view('layouts.dashboard_Admin');
})->middleware(['auth', 'verified'])->name('Admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/editProfil', function () {
    return view('users.editProfil');
});
Route::get('/front', function () {
    return view('layouts.frontdash');
});
Route::get('/profilBackCheck', function () {
    return view('users.ConsulterProfil');
})->name('consulterProfilAdmin');

require __DIR__.'/auth.php';
