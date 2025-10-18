<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

        protected $fillable = [
        'nom',
        'stock',
        'heure_a_prendre',
        'details',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'prise_medicaments', 'medicament_id', 'user_id');
    }
}


