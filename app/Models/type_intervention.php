<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class type_intervention extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'libelle',
        'user_id'];
        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
