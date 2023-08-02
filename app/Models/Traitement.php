<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Traitement extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_traitement',
        'statut_id',
        'Observation',
        'ticket_id',
        'user_id'
      
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ticket()
    {
        return $this->belongsTo(ticket::class);
    }
public function statuts()
{
return $this->belongsTo(statut::class);

}
}