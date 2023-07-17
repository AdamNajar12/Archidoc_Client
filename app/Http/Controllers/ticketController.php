<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\client;
class ticketController extends Controller
{
    public function showTickets()
    {

        $tickets = ticket::join('users', 'tickets.user_id', '=', 'users.id')
        ->join('clients', 'tickets.client_id', '=', 'clients.id')
        ->select('tickets.*', 'users.prenom as user_name', 'clients.code_client')
        ->get();
    
        return view('ticket.index', compact('tickets'));
    }
    public function create()
    {
        $clients = client::all();
        return view('ticket.create',compact('clients'));
       
    }
    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'type_intervention' => 'required',
        'statut' => 'required',
        'date_demande' => 'required|date',
        'description' =>  'required',
        'vis_a_vis' => 'required',
        'client_id' => 'required|exists:clients,id',
    ]);
   
    $validatedData['user_id'] = auth()->user()->id;
     
    $ticket = ticket::create($validatedData);
    
    return redirect()->route('ticket.index');
}
    
    public function edit($id)
    {
       
        $ticket = ticket::findOrFail($id);
        $clients = client::pluck('code_client', 'id');
        
        
        return view('ticket.edit', compact('ticket'));
    }
    
    public function update(Request $request,  $id)
    {
        $ticket = ticket::findOrFail($id);

        $validatedData = $request->validate([
            'type_intervention' => 'required',
            'statut' => 'required',
            'description' =>  'required',
            'vis_a_vis' => 'required',
            'client_id' => 'required|exists:clients,id',
        ]);
    
        $data = $request->only(['type_intervention', 'statut', 'description', 'vis_a_vis', 'clinet_id']);
        $data['user_id'] = auth()->user()->id;
    
        $ticket->update($data);
    
        return redirect()->route('ticket.index');
    }
    
    
    
    public function destroy(client $client)
    {
        $client->delete();
        return redirect()->route('ticket.index');
    }
    
    
}
