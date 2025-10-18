<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriseMedicament extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'medicament_id',
        'quantite_pris',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class);
    }

}

