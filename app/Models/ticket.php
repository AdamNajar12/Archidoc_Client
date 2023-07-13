<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_intervention',
        'statut',
        'date_demande',
        'description',
        'vis_a_vis',
          'client_id' ,     
        'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function client()
    {
        return $this->belongsTo(client::class);
    }
}
