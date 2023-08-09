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
use App\Models\User;
use App\Models\Traitement;
use App\Models\fichier;
use App\Models\Ticket_Utilisateur;
use Illuminate\Pagination\Paginator;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\TicketsExport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;


class ticketController extends Controller
{
    public function showTickets()
    {

        $tickets = ticket::join('users', 'tickets.user_id', '=', 'users.id')
        ->join('clients', 'tickets.client_id', '=', 'clients.id')
        ->join('type_interventions','tickets.type_intervention','=','type_interventions.id')
        ->join('statuts','tickets.statut','=','statuts.id')
        ->select('tickets.*', 'users.prenom as user_name', 'clients.code_client','users.nom as second_name','type_interventions.libelle as type_intervention','statuts.libelle as statut')
        ->withTrashed()
        ->paginate(5);
    
        return view('ticket.index', compact('tickets'));
    }
    public function showDetails($id)
    {
        $ticket= Ticket::findOrFail($id);
   
        $user = User::join('tickets', 'users.id', '=', 'tickets.user_id')
        ->where('tickets.id', $id)
        ->select('users.prenom as user_prenom', 'users.nom as user_nom')
        ->first();
        $client=client::join('tickets','clients.id','=','tickets.client_id')
        ->where('tickets.id',$id)
        ->select('clients.code_client as code_client')
        ->first();
        $statut=statut::join('tickets','statuts.id','=','tickets.statut')
        ->where('tickets.id',$id)
        ->select('statuts.libelle as statut')
        ->first();
        $type_intervention=type_intervention::join('tickets','type_interventions.id','=','tickets.type_intervention')
        ->where('tickets.id',$id)
        ->select('type_interventions.libelle as type_intervention')
        ->first();
        $fichier=fichier::join('tickets','fichiers.ticket_id','=','tickets.id')
        ->where('tickets.id',$id)
        ->select('fichiers.nom_fichier as nomFichier')
        ->first();
        $applications = $ticket->applications;
        $utilisateursAffectes = $ticket->users;
        return view('ticket.details', compact('utilisateursAffectes','statut','type_intervention','ticket','user','client','fichier','applications'));



    }
   
   
    public function create()
{
    $clients = Client::all();
    $applications = collect(); // Créez une collection vide pour les applications

    // Vérifiez si un client est sélectionné dans la requête
    // Si oui, récupérez les applications associées à ce client
  
     
    $type_interventions = type_intervention::all();
    $statuts = statut::all();
    $users=User::all();

    return view('ticket.create', compact('clients', 'applications', 'type_interventions', 'statuts','users'));
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
    $ticketUsers=[];
    $usersIds=$request->input('users');
    foreach($usersIds as $userId){
        $ticketUsers[]=[
    'ticket_id'=>$ticketID,
    'user_id' =>$userId,

   ];
 
}
Ticket_Utilisateur::insert($ticketUsers);



    $dateTraitement = Carbon::now();
    $statut = $ticket->statut;
    $client_id=$ticket->client_id;
  Traitement::create([
        'date_traitement'=>$dateTraitement ,
        'statut_id' => $statut  ,
        'client' => $client_id,
        'ticket_id'=> $ticketID  ,
        'user_id' => auth()->user()->id,
    ]);
    foreach ($request->file('nom_fichier') as $file) {
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public', $fileName);

        Fichier::create([
            'nom_fichier' => $fileName,
            'ticket_id' => $ticketID,
            'user_id' => auth()->user()->id,
        ]);
    }
    return redirect()->route('ticket.index');
}
    
  
public function edit($id)
    {
       
        
        $ticket = Ticket::with('traitement')->findOrFail($id);

        $type_intervention=type_intervention::pluck('libelle','id');
        $statut=statut::pluck('libelle','id');
        $client=client::join('tickets','clients.id','=','tickets.client_id')
        ->where('tickets.id',$id)
        ->select('clients.code_client as code_client')
        ->first();
        $applications = $ticket->applications;
        $users=User::all();
        return view('ticket.edit', compact('users','statut','type_intervention','ticket','applications','client'));
    }
    

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
    
        $validatedData = $request->validate([
            'type_intervention' => 'required',
            'statut' => 'required',
            'date_demande' => 'required|date',
            'description' => 'required',
            'vis_a_vis' => 'required',
        ]);
    
        $ticket->update($validatedData);
    
        $dateTraitement = Carbon::now();
        $traitement = Traitement::where('ticket_id', $id)->first();
        $observation = $request->input('Observation');
        if ($traitement) {
            // Mettre à jour le statut du traitement en fonction du nouveau statut du ticket
            $traitement->update([
                'date_traitement' => $dateTraitement,
                'statut_id' => $ticket->statut,
                'Observation' =>   $observation, // Remplacez 'valeur_de_l_observation' par la valeur que vous souhaitez mettre à jour
                'ticket_id' => $ticket->id,
                'user_id' => auth()->user()->id,
            ]);
        }
    
        if ($request->hasFile('nom_fichier')) {
            foreach ($request->file('nom_fichier') as $file) {
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public', $fileName);
    
                Fichier::create([
                    'nom_fichier' => $fileName,
                    'ticket_id' => $ticket->id,
                    'user_id' => auth()->user()->id,
                ]);
            }
        }
        $ticketUsers=[];
        $usersIds=$request->input('users');
        foreach($usersIds as $userId){
            $ticketUsers[]=[
        'ticket_id'=>$ticket->id,
        'user_id' =>$userId,
    
       ];
     
    }
    Ticket_Utilisateur::insert($ticketUsers);
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

public function storefront(Request $request)
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
        'statut_id' => $statut  ,
        'client' => $client_id,
        'ticket_id'=> $ticketID  ,
        'user_id' => auth()->user()->id,
    ]);
 
    foreach ($request->file('nom_fichier') as $file) {
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public', $fileName);

        Fichier::create([
            'nom_fichier' => $fileName,
            'ticket_id' => $ticketID,
            'user_id' => auth()->user()->id,
        ]);
    }
    

    return redirect()->route('ticket.addFront');




}

public function AddTicketFront()
{

    $clients = Client::all();
    $applications = collect(); // Créez une collection vide pour les applications

    // Vérifiez si un client est sélectionné dans la requête
    // Si oui, récupérez les applications associées à ce client
  
     
    $type_interventions = type_intervention::all();
    $statuts = statut::all();

    return view('ticket.AddFront', compact('clients', 'applications', 'type_interventions', 'statuts'));

}
public function showFrontTicket()

{
 

    $user = auth()->user();

    // Récupérer les tickets associés à l'utilisateur authentifié via la table "ticket_utilisateurs"
    $ticketsFromTicketUtilisateurs = Ticket::whereHas('users', function ($query) use ($user) {
            $query->where('ticket__utilisateurs.user_id', $user->id); // Spécifier la table ticket_utilisateurs pour la colonne user_id
        })
        ->join('clients', 'tickets.client_id', '=', 'clients.id')
        ->join('type_interventions', 'tickets.type_intervention', '=', 'type_interventions.id')
        ->join('statuts', 'tickets.statut', '=', 'statuts.id')
        ->select('tickets.*', 'clients.code_client', 'type_interventions.libelle as type_intervention', 'statuts.libelle as statut');

    // Récupérer les tickets que l'utilisateur authentifié a créés via la clé étrangère "user_id" dans la table "tickets"
    $ticketsFromUser = Ticket::where('tickets.user_id', $user->id) // Spécifier la table tickets pour la colonne user_id
        ->join('clients', 'tickets.client_id', '=', 'clients.id')
        ->join('type_interventions', 'tickets.type_intervention', '=', 'type_interventions.id')
        ->join('statuts', 'tickets.statut', '=', 'statuts.id')
        ->select('tickets.*', 'clients.code_client', 'type_interventions.libelle as type_intervention', 'statuts.libelle as statut');

    // Combiner les deux requêtes avec union
    $tickets = $ticketsFromTicketUtilisateurs->union($ticketsFromUser)->get();



    return view('ticket.indexFront', compact('tickets'));

}
public function TraiterTicketFront(Request $request, $id)
{
    $ticket = Ticket::findOrFail($id);
    
    $validatedData = $request->validate([
        'type_intervention' => 'required',
        'statut' => 'required',
        'date_demande' => 'required|date',
        'description' => 'required',
        'vis_a_vis' => 'required',
    ]);

    $ticket->update($validatedData);

    $dateTraitement = Carbon::now();
    $traitement = Traitement::where('ticket_id', $id)->first();
    $observation = $request->input('Observation');
    if ($traitement) {
        // Mettre à jour le statut du traitement en fonction du nouveau statut du ticket
        $traitement->update([
            'date_traitement' => $dateTraitement,
            'statut_id' => $ticket->statut,
            'Observation' =>   $observation, // Remplacez 'valeur_de_l_observation' par la valeur que vous souhaitez mettre à jour
            'ticket_id' => $ticket->id,
            'user_id' => auth()->user()->id,
        ]);
    }

    if ($request->hasFile('nom_fichier')) {
        foreach ($request->file('nom_fichier') as $file) {
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public', $fileName);

            Fichier::create([
                'nom_fichier' => $fileName,
                'ticket_id' => $ticket->id,
                'user_id' => auth()->user()->id,
            ]);
        }
    }

    return redirect()->route('ticket.showFront');






}
public function TraiterFront($id)
{
    $ticket = Ticket::with('traitement')->findOrFail($id);
      
    $type_intervention=type_intervention::pluck('libelle','id');
    $statut=statut::pluck('libelle','id');
    $client=client::join('tickets','clients.id','=','tickets.client_id')
    ->where('tickets.id',$id)
    ->select('clients.code_client as code_client')
    ->first();
    $applications = $ticket->applications;
    return view('ticket.traiterTicket', compact('statut','type_intervention','ticket','applications','client'));






}
public function restore($id)
{
    // Restaurer l'élément supprimé
    ticket::withTrashed()->where('id', $id)->restore();

    // Rediriger vers la page d'index des Applications
    return redirect()->route('ticket.index')->with('success', 'ticket restaurée avec succès !');
}
public function PDF_Tickets()
{
    $user = auth()->user();

    // Récupérer les tickets associés à l'utilisateur authentifié via la table "ticket_utilisateurs"
    $ticketsFromTicketUtilisateurs = Ticket::whereHas('users', function ($query) use ($user) {
            $query->where('ticket__utilisateurs.user_id', $user->id); // Spécifier la table ticket_utilisateurs pour la colonne user_id
        })
        ->join('clients', 'tickets.client_id', '=', 'clients.id')
        ->join('type_interventions', 'tickets.type_intervention', '=', 'type_interventions.id')
        ->join('statuts', 'tickets.statut', '=', 'statuts.id')
        ->select('tickets.*', 'clients.code_client', 'type_interventions.libelle as type_intervention', 'statuts.libelle as statut');

    // Récupérer les tickets que l'utilisateur authentifié a créés via la clé étrangère "user_id" dans la table "tickets"
    $ticketsFromUser = Ticket::where('tickets.user_id', $user->id) // Spécifier la table tickets pour la colonne user_id
        ->join('clients', 'tickets.client_id', '=', 'clients.id')
        ->join('type_interventions', 'tickets.type_intervention', '=', 'type_interventions.id')
        ->join('statuts', 'tickets.statut', '=', 'statuts.id')
        ->select('tickets.*', 'clients.code_client', 'type_interventions.libelle as type_intervention', 'statuts.libelle as statut');

    // Combiner les deux requêtes avec union
    $tickets = $ticketsFromTicketUtilisateurs->union($ticketsFromUser)->get();


    $pdf = Pdf::loadView('ticket.PDF', ['tickets' => $tickets]);
    return $pdf->stream('tickets.pdf');


}
public function exportTickets()
    {
        $user = auth()->user();

        $ticketsFromTicketUtilisateurs = Ticket::whereHas('users', function ($query) use ($user) {
             $query->where('ticket__utilisateurs.user_id', $user->id);
         })
         ->join('clients', 'tickets.client_id', '=', 'clients.id')
         ->join('type_interventions', 'tickets.type_intervention', '=', 'type_interventions.id')
         ->join('statuts', 'tickets.statut', '=', 'statuts.id')
         ->select('tickets.*', 'clients.code_client', 'type_interventions.libelle as type_intervention', 'statuts.libelle as statut');
    
         $ticketsFromUser = Ticket::where('tickets.user_id', $user->id)
             ->join('clients', 'tickets.client_id', '=', 'clients.id')
             ->join('type_interventions', 'tickets.type_intervention', '=', 'type_interventions.id')
             ->join('statuts', 'tickets.statut', '=', 'statuts.id')
             ->select('tickets.*', 'clients.code_client', 'type_interventions.libelle as type_intervention', 'statuts.libelle as statut');
    
         $tickets = $ticketsFromTicketUtilisateurs->union($ticketsFromUser)->get();
    
         // Créer une instance de la classe Spreadsheet
         $spreadsheet = new Spreadsheet();
         $sheet = $spreadsheet->getActiveSheet();
    
         // Ajouter les en-têtes des colonnes
         $sheet->setCellValue('A1', 'Type d\'intervention');
         $sheet->setCellValue('B1', 'Statut');
         $sheet->setCellValue('C1', 'Date demandée');
         $sheet->setCellValue('D1', 'Code client');
    
         // Remplir les données des tickets
         $row = 2;
         foreach ($tickets as $ticket) {
             $sheet->setCellValue('A' . $row, $ticket->type_intervention);
             $sheet->setCellValue('B' . $row, $ticket->statut);
             $sheet->setCellValue('C' . $row, $ticket->date_demande);
             $sheet->setCellValue('D' . $row, $ticket->code_client);
             $row++;
         }
    
         // Créer un objet Csv Writer
         $writer = new Csv($spreadsheet);
    
         
        $filePath = storage_path('app/tickets.csv');

       
        
        $writer->save($filePath);

return response()->download($filePath, 'tickets.csv');
    }
}
