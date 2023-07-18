<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\type_intervention;

class Type_interventions extends Controller
{
    public function showType_d_interventions()
    {

           $type_interventions = type_intervention::join('users', 'type_interventions.user_id', '=', 'users.id')
    ->select('type_interventions.*', 'users.prenom as user_name','users.nom as second_name')
    ->get();
        return view('type_intervention.index', compact('type_interventions'));
    }
    public function create()
    {
      
        return view('type_intervention.create');
       
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
    

}
