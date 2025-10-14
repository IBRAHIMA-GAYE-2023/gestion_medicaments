<?php

namespace App\Models;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'content',
        'receiver_id',
        'is_read',
        'typeMedicament',
    ];
}
