<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'application_id'
        // Ajoutez les autres colonnes qui sont autorisées à être assignées en masse
    ];
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

}
