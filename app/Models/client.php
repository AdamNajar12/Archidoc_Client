<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_client',
        'raison_sociale',
        'telephone',
        'Adresse',
        'localisation',
        'user_id'
    ];

    // Définir les relations si nécessaire
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'client_application');
    }
    
}
