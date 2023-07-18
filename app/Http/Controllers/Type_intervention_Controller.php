<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Type_intervention extends Controller
{
    public function showType_d_interventions()
    {

           $type_interventions = type_intervention::join('users', 'type_interventions.user_id', '=', 'users.id')
    ->select('type_interventions.*', 'users.prenom as user_name','users.nom as second_name')
    ->get();
        return view('type_interventions.index', compact('statuts'));
    }
    public function create()
    {
      
        return view('type_interventions.create');
       
    }
    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'libelle' => 'required',
        
    ]);

    $validatedData['user_id'] = auth()->user()->id;

    $type_intervention = type_intervention::create($validatedData);

    return redirect()->route('type_interventions.index');
}
    
    public function edit($id)
    {
       
        $type_interventions = type_intervention::findOrFail($id);
     
        
        
        return view('type_interventions.edit', compact('type_interventions'));
    }
    
    public function update(Request $request,  $id)
    {
        $type_interventions = type_intervention::findOrFail($id);

        $validatedData = $request->validate([
            'libelle' => 'required',
           
        ]);
    
        $data = $request->only(['libelle']);
        $data['user_id'] = auth()->user()->id;
    
        $type_intervention->update($data);
    
        return redirect()->route('type_interventions.index');
    }
    
    
    
    public function destroy(type_intervention $type_intervention)
    {
        $type_intervention->delete();
        return redirect()->route('type_interventions.index');
    }
    

}
