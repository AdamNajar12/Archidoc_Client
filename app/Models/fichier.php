<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class fichier extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'nom_fichier', // Ajoutez ici les autres colonnes qui peuvent être attribuées en masse
        'ticket_id',
        'user_id'
    ];
    public function Ticket()
    {
        return $this->belongsTo(ticket::class, 'tickets');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
