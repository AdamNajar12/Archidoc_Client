<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UtilisateurController extends Controller
{

    public function showUsers()
    {

           $users = User::all();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        
        return view('users.create');
       
    }
    
    public function store(Request $request)
{
 
}
    
    public function edit($id)
    {
       
        $user = User::findOrFail($id);
     
        
        
        return view('users.edit');
    }
    
    public function update(Request $request,  $id)
    {
        $users = User::findOrFail($id);

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
    
    
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }





















}
