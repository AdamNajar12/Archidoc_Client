<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\statut;
use App\Models\User;
class StatutController extends Controller
{
    public function showStatuts()
    {

           $Statuts = statut::join('users', 'statuts.user_id', '=', 'users.id')
    ->select('statuts.*', 'users.prenom as user_name','users.nom as second_name')
    ->get();
        return view('statuts.index', compact('Statuts'));
    }

    public function showDetails($id)
    {
        $statut= statut::findOrFail($id);
        $user = User::join('statuts', 'users.id', '=', 'statuts.user_id')
        ->where('statuts.id', $id)
        ->select('users.prenom as user_prenom', 'users.nom as user_nom')
        ->first();
        return view('statuts.Details', compact('statut','user'));



    }







    public function create()
    {
      
        return view('statuts.create');
       
    }
    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'libelle' => 'required',
        
    ]);

    $validatedData['user_id'] = auth()->user()->id;

    $Statut = statut::create($validatedData);

    return redirect()->route('statuts.index');
}
    
    public function edit($id)
    {
       
        $statut = statut::findOrFail($id);
     
        
        
        return view('statuts.edit', compact('statut'));
    }
    
    public function update(Request $request,  $id)
    {
        $statuts = statut::findOrFail($id);

        $validatedData = $request->validate([
            'libelle' => 'required',
           
        ]);
    
        $data = $request->only(['libelle']);
        $data['user_id'] = auth()->user()->id;
    
        $Application->update($data);
    
        return redirect()->route('statuts.index');
    }
    
    
    
    public function destroy(statut $statut)
    {
        $statut->delete();
        return redirect()->route('statuts.index');
    }
    
}
