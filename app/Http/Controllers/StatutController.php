<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatutController extends Controller
{
    public function showStatus()
    {

           $Statuts = Statut::join('users', 'Applications.user_id', '=', 'users.id')
    ->select('Statuts.*', 'users.prenom as user_name','users.nom as second_name')
    ->get();
        return view('Applications.index', compact('Applications'));
    }
    public function create()
    {
      
        return view('Applications.create');
       
    }
    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'libelle' => 'required',
        
    ]);

    $validatedData['user_id'] = auth()->user()->id;

    $Application = Application::create($validatedData);

    return redirect()->route('Applications.index');
}
    
    public function edit($id)
    {
       
        $Application = Application::findOrFail($id);
     
        
        
        return view('Applications.edit', compact('Application'));
    }
    
    public function update(Request $request,  $id)
    {
        $Application = Application::findOrFail($id);

        $validatedData = $request->validate([
            'libelle' => 'required',
           
        ]);
    
        $data = $request->only(['libelle']);
        $data['user_id'] = auth()->user()->id;
    
        $Application->update($data);
    
        return redirect()->route('Applications.index');
    }
    
    
    
    public function destroy(Application $Application)
    {
        $Application->delete();
        return redirect()->route('Applications.index');
    }
}
