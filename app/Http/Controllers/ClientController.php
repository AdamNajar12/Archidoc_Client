<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Client_Application_Controller;
use Illuminate\Http\Request;
use App\Models\client;
use App\Models\Application;
use App\Models\Client_Application;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ClientController extends Controller
{
    public function showClients()
    {

        $clients = Client::withTrashed()->paginate(5);

        return view('clients.index', compact('clients'));
    }
    public function showDetails($id)
    {
        $client = client::findOrFail($id);
        $user = User::join('clients', 'users.id', '=', 'clients.user_id')
        ->where('clients.id', $id)
        ->select('users.prenom as user_prenom', 'users.nom as user_nom')
        ->first();
        return view('clients.Details', compact('client','user'));



    }
    public function create()
    {
        $Applications = Application::all();
        return view('clients.create',compact('Applications'));
       
    }
    
    public function store(Request $request,client $client)
{
 /*   $validatedData = $request->validate([
        'code_client' => 'required',
        'raison_sociale' => 'required',
        'telephone' =>  'required|digits:8',
        'Adresse' => 'required',
        'localisation' => 'required',
        
    ]);
   
    $validatedData['user_id'] = auth()->user()->id;
   
    
     $validatedApplicationData = $request->validate([
        'application_id' => 'required|exists:applications,id',
    ]);

    $applicationID = $validatedApplicationData['application_id'];
    $clientID = $client->id;
    Client_Application::create([
        'client_id' => $clientID,
        'application_id'=> $applicationID  ,
    ]);
    $client = client::create($validatedData);
    return redirect()->route('clients.index');*/
    $validatedData = $request->validate([
        'code_client' => 'required|unique:clients',
        'raison_sociale' => 'required',
        'telephone' =>  'required|digits:8',
        'Adresse' => 'required',
        'localisation' => 'required',
        'applications' => 'required|array|exists:applications,id',
    ], [
        'code_client.required' => 'Le code client est obligatoire.',
        'code_client.unique' => 'Ce code client est déjà utilisé. Veuillez en choisir un autre.',
        'raison_sociale.required' => 'La raison sociale est obligatoire.',
        'telephone.required' => 'Le numéro de téléphone est obligatoire.',
        'telephone.digits' => 'Le numéro de téléphone doit contenir 8 chiffres.',
        'Adresse.required' => 'L\'adresse est obligatoire.',
        'localisation.required' => 'La localisation est obligatoire.',
        'application_id.required' => 'Veuillez sélectionner une application.',
        'application_id.exists' => 'L\'application sélectionnée est invalide.',
    ]);

    $validatedData['user_id'] = auth()->user()->id;

    try {
        // Commencer la transaction
        DB::beginTransaction();

        // Créer le nouvel enregistrement client
        $client = Client::create($validatedData);
        $applicationIds = $request->input('applications');

        // Créer les enregistrements dans la table client_Application avec l'ID du client nouvellement créé
        $clientApplications = [];
        foreach ($applicationIds as $applicationId) {
            $clientApplications[] = [
                'client_id' => $client->id,
                'application_id' => $applicationId,
            ];
        }
        Client_Application::insert($clientApplications);


        // Valider la transaction
        DB::commit();

        return redirect()->route('clients.index');
    } catch (\Exception $e) {
        // En cas d'erreur, annuler la transaction
        DB::rollback();

        // Gérer l'erreur comme vous le souhaitez
        // Par exemple, rediriger vers une page d'erreur ou afficher un message d'erreur
        return back()->withErrors(['error' => 'Une erreur s\'est produite lors de la création du client et de l\'application. Veuillez réessayer.']);
    }
}
    
    public function edit($id)
    {
       
        $client = client::findOrFail($id);
        $clientApplicationIds = $client->applications->pluck('id')->toArray();

        // Récupérer les applications en excluant celles déjà associées au client
        $Applications = Application::whereNotIn('id', $clientApplicationIds)->get();
        
        
        return view('clients.edit', compact('client','Applications'));
    }
    
    public function update(Request $request,  $id)
    {
        $client = Client::findOrFail($id);

        $validatedData = $request->validate([
            'code_client' => 'required',
            'raison_sociale' => 'required',
            'telephone' => 'required',
            'Adresse' => 'required',
            'localisation' => 'required'
        ]);
    
        $data = $request->only(['code_client', 'raison_sociale', 'telephone', 'Adresse', 'localisation']);
        $data['user_id'] = auth()->user()->id;
    
        $client->update($data);
        $applicationIds = $request->input('applications');

        // Créer les enregistrements dans la table client_Application avec l'ID du client nouvellement créé
        $clientApplications = [];
        foreach ($applicationIds as $applicationId) {
            $clientApplications[] = [
                'client_id' => $client->id,
                'application_id' => $applicationId,
            ];
        }
        Client_Application::insert($clientApplications);

        return redirect()->route('clients.index');
    }
    
    
    
    public function destroy(client $client,Client_Application $client_Application)
    {
        $client->delete();
        $client_Application->delete();
        return redirect()->route('clients.index');
    }
    public function ShowApplications_for_Clients($id)
    {
        $client = Client::findOrFail($id);
        $applications = $client->applications;
        return view('clients.applications', compact('client', 'applications'));

    }
    public function restore($id)
    {
        // Restaurer l'élément supprimé
        Client::withTrashed()->where('id', $id)->restore();
    
        // Rediriger vers la page d'index des Applications
        return redirect()->route('clients.index')->with('success', 'client restaurée avec succès !');
    }












}
