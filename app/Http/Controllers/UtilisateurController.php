<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
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
    $request->validate([
        'nom' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);
    $user = User::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'user_name' => $request->username,
        'role' => $request->role,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    

    event(new Registered($user));

    Auth::login($user);
    return redirect()->route('users.index');
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
