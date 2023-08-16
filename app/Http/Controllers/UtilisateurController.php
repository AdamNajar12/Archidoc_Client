<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use App\Models\image;
use App\Models\message;
use Illuminate\Pagination\Paginator;
class UtilisateurController extends Controller
{

    public function showUsers()
    {

           $users = User::withTrashed()->paginate(5);
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
        'prenom'=> ['required', 'string', 'max:255'],
        'user_name'=> 'required|unique:users',
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ], [
        'user_name.unique' => 'Le nom d\'utilisateur est déjà pris.', // Message d'erreur personnalisé
    ]);
    $user = User::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'user_name' => $request->user_name,
        'role' => $request->role,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    if ($request->hasFile('nom_image')) {
        $file = $request->file('nom_image');
        
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public/user_image', $fileName);
    
        image::create([
            'nom_image' => $fileName,
            'user_id' => $user->id,
        ]);
    }

    event(new Registered($user));

    
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
            'user_name' => 'required', // Retirer la validation unique ici
            'role' => 'required',
            'email' => 'required'
        ]);
        
        $data = $request->only(['nom', 'prenom', 'user_name', 'role', 'email']);
        
        // Vérification pour le nom d'utilisateur unique
        if ($user->user_name !== $data['user_name'] && User::where('user_name', $data['user_name'])->exists()) {
            return redirect()->back()->withErrors(['user_name' => 'Le nom d\'utilisateur est déjà pris.']);
        }
        
        $user->update($data);
        
       

if ($request->hasFile('nom_image')) {
    $file = $request->file('nom_image');
    
    $fileName = $file->getClientOriginalName();
    $file->storeAs('public/user_image', $fileName);

    // Recherche de l'image associée à l'utilisateur
    $image = Image::where('user_id', $user->id)->first();

    // Si une image est trouvée, mettez à jour le nom de l'image
    if ($image) {
        $image->update([
            'nom_image' => $fileName,
        ]);
    } else {
        // Si aucune image n'est trouvée, créez une nouvelle entrée dans la table des images
        Image::create([
            'nom_image' => $fileName,
            'user_id' => $user->id,
        ]);
    }
}

        
        return redirect()->route('users.index');
        
    }
    
    
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
    public function restore($id)
    {
        // Restaurer l'élément supprimé
        User::withTrashed()->where('id', $id)->restore();
    
        // Rediriger vers la page d'index des Applications
        return redirect()->route('users.index')->with('success', 'user restaurée avec succès !');
    }
    public function showUserList()
    {
        
        $users = User::where('id', '!=', auth()->id())->get();
      
        return view('users.chat', compact('users'));
    }
    public function chat($receiverId = null)
    {
        $users = User::where('id', '!=', auth()->id())->get();
    $receiver = null;
    $messages = [];

    if ($receiverId) {
        $receiver = User::findOrFail($receiverId);
        $messages = Message::where(function ($query) use ($receiverId) {
            $query->where('sender_id', auth()->id())->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();
    }   

        return view('users.chat', compact('receiver', 'messages','users'));
    }
    public function sendMessage(Request $request)
{
    $message = new Message([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->receiver_id,
        'content' => $request->content
    ]);
    $message->save();

    return redirect()->back();
}


public function chatBack($receiverId = null)
    {
        $users = User::where('id', '!=', auth()->id())->get();
    $receiver = null;
    $messages = [];

    if ($receiverId) {
        $receiver = User::findOrFail($receiverId);
        $messages = Message::where(function ($query) use ($receiverId) {
            $query->where('sender_id', auth()->id())->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();
    }   
        return view('users.chatBack', compact('receiver', 'messages','users'));
    }
    public function sendMessageBack(Request $request)
{
    $message = new Message([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->receiver_id,
        'content' => $request->content
    ]);
    $message->save();

    return redirect()->back();
}
    public function UpdateProfil(Request $request)
  {
    $validatedData = $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'user_name' => 'required', // Retirer la validation unique ici
        'role' => 'required',
        'email' => 'required'
    ]);
    
    $data = $request->only(['nom', 'prenom', 'user_name', 'role', 'email']);
    
    // Vérification pour le nom d'utilisateur unique
    if (auth()->user()->user_name !== $data['user_name'] && User::where('user_name', $data['user_name'])->exists()) {
        return redirect()->back()->withErrors(['user_name' => 'Le nom d\'utilisateur est déjà pris.']);
    }
    
    auth()->user()->update($data);
    $user = auth()->user();

if ($request->hasFile('nom_image')) {
    $file = $request->file('nom_image');
    
    $fileName = $file->getClientOriginalName();
    $file->storeAs('public/user_image', $fileName);

    // Recherche de l'image associée à l'utilisateur
    $image = Image::where('user_id', $user->id)->first();

    // Si une image est trouvée, mettez à jour le nom de l'image
    if ($image) {
        $image->update([
            'nom_image' => $fileName,
        ]);
    } else {
        // Si aucune image n'est trouvée, créez une nouvelle entrée dans la table des images
        Image::create([
            'nom_image' => $fileName,
            'user_id' => $user->id,
        ]);
    }
}

    
    return redirect()->route('consulterProfilAdmin');









  }
 



















}
