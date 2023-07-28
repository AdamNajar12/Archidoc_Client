<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_intervention', // Ajoutez ici les autres colonnes qui peuvent être attribuées en masse
        'statut',
        'date_demande',
        'description',
        'vis_a_vis',
        'client_id',
        'user_id'
    ];
    public function typeIntervention()
    {
        return $this->belongsTo(type_intervention::class, 'type_interventions');
    }

    // Define the relationship with Statut
    public function statut()
    {
        return $this->belongsTo(Statut::class, 'statuts');
    }
    public function fichiers()
{
    return $this->hasMany(Fichier::class);
}
}
