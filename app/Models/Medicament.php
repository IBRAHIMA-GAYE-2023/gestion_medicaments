<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'dosage', 'frequence', 'duree', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
