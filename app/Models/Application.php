<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'user_id'];
        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function clients()
        {
            return $this->belongsToMany(Client::class, 'client__applications');
        }
        public function tickets()
        {
            return $this->belongsToMany(Ticket::class, 'ticket__applications', 'application_id', 'ticket_id');
        }

    }
