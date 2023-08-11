<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class image extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'nom_image', // Ajoutez ici les autres colonnes qui peuvent être attribuées en masse
        'user_id'
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
