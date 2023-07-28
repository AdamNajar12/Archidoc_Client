<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Traitement;
use App\Models\ticket;
use App\Models\statut;
use App\Models\User;
class Traitement_Controller extends Controller
{
   public function ShowListTraitements()
   {
   
    $traitements=Traitement::join('users', 'traitements.user_id', '=', 'users.id')
    ->join('statuts','traitements.statut_id','=','statuts.id')
    ->select( 'traitements.*', 'statuts.libelle as statuts')
    ->with('ticket.client')
    ->get();
   
    return view('traitement.index', compact('traitements'));
  
   }

public function showDetails($id)
{
    $traitement= Traitement::findOrFail($id);
    $statut=statut::join('traitements','statuts.id','=','traitements.statut_id')
        ->where('traitements.id',$id)
        ->select('statuts.libelle as statut')
        ->first();
        $codeClient = $traitement->ticket->client->code_client;
    $ticket=ticket::join('traitements','tickets.id','=','traitements.ticket_id')
    ->where('traitements.id',$id)
    ->select('tickets.date_demande as date_demande')
    ->first();
    $user = User::join('traitements', 'users.id', '=', 'traitements.user_id')
        ->where('traitements.id', $id)
        ->select('users.prenom as user_prenom', 'users.nom as user_nom')
        ->first();
   
   
        return view('traitement.details', compact('user','statut','codeClient','ticket','traitement'));



}








}
