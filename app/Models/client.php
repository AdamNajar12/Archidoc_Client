<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class client extends Model
{
    use HasFactory;
    use SoftDeletes;
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
        return $this->belongsToMany(Application::class, 'client__applications');
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
