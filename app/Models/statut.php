<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statut extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'user_id'];
        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
