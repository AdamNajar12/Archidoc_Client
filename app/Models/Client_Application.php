<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client_Application extends Model
{
    use HasFactory;
    use SoftDeletes;
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
