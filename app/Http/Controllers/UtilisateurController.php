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
    public function showDetails($id)
    {
        $user = User::findOrFail($id);
               return view('users.Details', compact('user'));



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
     
        
        
        return view('users.edit',compact('user'));
    }
    
    public function update(Request $request,  $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'user_name' => 'required',
            'role' => 'required',
            'email' => 'required'
        ]);
    
        $data = $request->only(['nom', 'prenom', 'user_name', 'role', 'email']);
        
    
        $user->update($data);
    
        return redirect()->route('users.index');
    }
    
    
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }





















}
