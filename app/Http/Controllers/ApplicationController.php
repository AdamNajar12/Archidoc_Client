<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use Illuminate\Pagination\Paginator;
class ApplicationController extends Controller
{
    public function showApplications()
    {
        $Applications = Application::withTrashed()->paginate(5);
        return view('Applications.index', compact('Applications'));
    }
    public function create()
    {
      
        return view('Applications.create');
       
    }
    

    public function showDetails($id)
    {
        $Application = Application::findOrFail($id);
        $user = User::join('applications', 'users.id', '=', 'applications.user_id')
        ->where('applications.id', $id)
        ->select('users.prenom as user_prenom', 'users.nom as user_nom')
        ->first();
        return view('Applications.Details', compact('Application','user'));



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
    
    public function restore($id)
    {
        // Restaurer l'élément supprimé
        Application::withTrashed()->where('id', $id)->restore();
    
        // Rediriger vers la page d'index des Applications
        return redirect()->route('Applications.index')->with('success', 'Application restaurée avec succès !');
    }
}
