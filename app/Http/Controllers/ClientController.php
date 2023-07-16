<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Client_Application_Controller;
use Illuminate\Http\Request;
use App\Models\client;
use App\Models\Application;
use App\Models\Client_Application;
class ClientController extends Controller
{
    public function showClients()
    {

           $clients = Client::join('users', 'clients.user_id', '=', 'users.id')
    ->select('clients.*', 'users.prenom as user_name')
    ->get();
        return view('clients.index', compact('clients'));
    }
    public function create()
    {
        $Applications = Application::all();
        return view('clients.create',compact('Applications'));
       
    }
    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'code_client' => 'required',
        'raison_sociale' => 'required',
        'telephone' => 'required',
        'Adresse' => 'required',
        'localisation' => 'required',
    ]);
   
    $validatedData['user_id'] = auth()->user()->id;
    $applicationID = $request->input('application_id'); 
    $client = client::create($validatedData);
    $clientID = $client->id;
    Client_Application::create([
        'client_id' => $clientID,
        'application_id'=> $applicationID  ,
    ]);
    return redirect()->route('clients.index');
}
    
    public function edit($id)
    {
       
        $client = client::findOrFail($id);
     
        
        
        return view('clients.edit', compact('client'));
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
    
        return redirect()->route('clients.index');
    }
    
    
    
    public function destroy(client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
    

}
