<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_Application extends Model
{
    use HasFactory;
    protected $table = 'client__applications';
    
    public function ticket()
    {
        return $this->belongsTo(ticket::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
