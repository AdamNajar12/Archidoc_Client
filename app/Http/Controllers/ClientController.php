<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client;

class ClientController extends Controller
{
    public function showClients()
    {
            $clients = client::all();
        
        return view('Clients.index', compact('clients'));
    }
    public function create()
    {
      
        return view('Clients.create');
       
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

    $client = client::create($validatedData);

    return redirect()->route('clients.index');
}
    
    public function edit($id)
    {
       
        $client = client::findOrFail($id);
     
        
        
        return view('client.edit', compact('client'));
    }
    
    public function update(Request $request,  $id)
    {
        $client = client::findOrFail($id);

        $data = $request->only(['code_client', 'raison_sociale', 'telephone','Adresse','localisation']);
    
        
        $article->update($data);
    
    
        
    
        $article->update($request->all());
        return redirect()->route('client.index');
    }
    
    
    
    public function destroy(client $client)
    {
        $article->delete();
        return redirect()->route('client.index');
    }
    

}
