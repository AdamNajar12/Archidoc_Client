<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ticket extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'type_intervention', // Ajoutez ici les autres colonnes qui peuvent être attribuées en masse
        'statut',
        'date_demande',
        'description',
        'vis_a_vis',
        'client_id',
        'user_id'
    ];
    public function users()
{
    return $this->belongsToMany(User::class, 'ticket__utilisateurs', 'ticket_id', 'user_id');
}
    public function typeIntervention()
    {
        return $this->belongsTo(type_intervention::class, 'type_intervention');
    }

    // Define the relationship with Statut
    public function statut()
    {
        return $this->belongsTo(Statut::class,'statut');
    }
    public function fichiers()
{
    return $this->hasMany(Fichier::class);
}
public function client()
{
    return $this->belongsTo(Client::class, 'client_id');
}
public function applications()
{
    return $this->belongsToMany(Application::class, 'ticket__applications', 'ticket_id', 'application_id');
}
public function traitement()
{
    return $this->hasOne(Traitement::class);
}
}
