<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ticket_Application extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'ticket_id',
        'application_id'
        // Ajoutez les autres colonnes qui sont autorisées à être assignées en masse
    ];
    
    public function ticket()
    {
        return $this->belongsTo(ticket::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    

}
