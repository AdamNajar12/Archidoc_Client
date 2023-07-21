<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\client;
use App\Models\Application;
use App\Models\type_intervention;
use App\Models\statut;
use App\Models\Ticket_Application;
use Carbon\Carbon; 
use App\Models\Traitement;
class ticketController extends Controller
{
    public function showTickets()
    {

        $tickets = ticket::join('users', 'tickets.user_id', '=', 'users.id')
        ->join('clients', 'tickets.client_id', '=', 'clients.id')
        ->join('type_interventions','tickets.type_intervention','=','type_interventions.id')
        ->join('statuts','tickets.statut','=','statuts.id')
        ->select('tickets.*', 'users.prenom as user_name', 'clients.code_client','users.nom as second_name','type_interventions.libelle as type_intervention','statuts.libelle as statut')
        ->get();
    
        return view('ticket.index', compact('tickets'));
    }
    public function create()
{
    $clients = Client::all();
    $applications = collect(); // Créez une collection vide pour les applications

    // Vérifiez si un client est sélectionné dans la requête
    // Si oui, récupérez les applications associées à ce client
  

    $type_interventions = type_intervention::all();
    $statuts = statut::all();

    return view('ticket.create', compact('clients', 'applications', 'type_interventions', 'statuts'));
}

    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'type_intervention' => 'required',
        'statut' => 'required|exists:statuts,id',
        'date_demande' => 'required|date',
        'description' =>  'required',
        'vis_a_vis' => 'required',
        'client_id' => 'required|exists:clients,id',
    ]);
   
    $validatedData['user_id'] = auth()->user()->id;
    $applicationID = $request->input('application_id'); 

    
    $ticket = ticket::create($validatedData);
    $ticketID = $ticket->id;
    $validatedApplicationData = $request->validate([
        'application_id' => 'required|exists:applications,id',
    ]);

    $applicationID = $validatedApplicationData['application_id'];
    
    Ticket_Application::create([
        'ticket_id' => $ticketID,
        'application_id'=> $applicationID  ,
    ]);
    $dateTraitement = Carbon::now();
    $statut = $ticket->statut;
    $client_id=$ticket->client_id;
  Traitement::create([
        'date_traitement'=>$dateTraitement ,
        'statut' => $statut  ,
        'client' => $client_id,
        'ticket_id'=> $ticketID  ,
        'user_id' => auth()->user()->id,
    ]);
    return redirect()->route('ticket.index');
}
    
  
public function edit($id)
    {
       
        $ticket = ticket::findOrFail($id);
        $clients = client::pluck('code_client', 'id');
        
        
        return view('ticket.edit', compact('ticket','clients'));
    }
    

    public function update(Request $request,  $id)
    {
        $ticket = ticket::findOrFail($id);

        $validatedData = $request->validate([
            'type_intervention' => 'required',
            'statut' => 'required',
            'date_demande' => 'required|date',
            'description' =>  'required',
            'vis_a_vis' => 'required',
            'client_id' => 'required|exists:clients,id',
        ]);
    
        $data = $request->only(['type_intervention', 'statut', 'description', 'vis_a_vis', 'clinet_id']);
        $data['user_id'] = auth()->user()->id;
    
        $ticket->update($data);
    
        return redirect()->route('ticket.index');
    }
    
    
    
    public function destroy(ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('ticket.index');
    }
    public function getApplicationsForClient($id)
{
    // Récupérer le client à partir de l'ID
    $client = Client::find($id);

    // Si le client est trouvé, renvoyer les applications associées en tant que réponse JSON
    if ($client) {
        $applications = $client->applications;
        return response()->json($applications);
    }

    // En cas d'erreur ou de client introuvable, renvoyer une réponse JSON vide
    return response()->json([]);
}
    
}
