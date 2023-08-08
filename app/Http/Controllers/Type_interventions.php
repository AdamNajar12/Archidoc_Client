<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\type_intervention;
use Illuminate\Pagination\Paginator;
use App\Models\User;

class Type_interventions extends Controller
{
    public function showType_d_interventions()
    {

           $type_interventions = type_intervention::withTrashed()->paginate(5);
        return view('type_intervention.index', compact('type_interventions'));
    }
    public function create()
    {
      
        return view('type_intervention.create');
       
    }
    

    public function showDetails($id)
    {
        $type_intervention = type_intervention::findOrFail($id);
        $user = User::join('type_interventions', 'users.id', '=', 'type_interventions.user_id')
        ->where('type_interventions.id', $id)
        ->select('users.prenom as user_prenom', 'users.nom as user_nom')
        ->first();
        return view('type_intervention.Details', compact('type_intervention','user'));



    }







    public function store(Request $request)
{
    $validatedData = $request->validate([
        'libelle' => 'required',
        
    ]);

    $validatedData['user_id'] = auth()->user()->id;

    $type_intervention = type_intervention::create($validatedData);

    return redirect()->route('type_intervention.index');
}
    
    public function edit($id)
    {
       
        $type_intervention = type_intervention::findOrFail($id);
     
        
        
        return view('type_intervention.edit', compact('type_intervention'));
    }
    
    public function update(Request $request,  $id)
    {
        $type_intervention= type_intervention::findOrFail($id);

        $validatedData = $request->validate([
            'libelle' => 'required',
           
        ]);
    
        $data = $request->only(['libelle']);
        $data['user_id'] = auth()->user()->id;
    
        $type_intervention->update($data);
    
        return redirect()->route('type_intervention.index');
    }
    
    
    
    public function destroy(type_intervention $type_intervention)
    {
        $type_intervention->delete();
        return redirect()->route('type_intervention.index');
    }
    public function restore($id)
    {
        // Restaurer l'élément supprimé
        type_intervention::withTrashed()->where('id', $id)->restore();
    
        // Rediriger vers la page d'index des Applications
        return redirect()->route('type_intervention.index')->with('success', 'type d intervention restaurée avec succès !');
    } 

}
