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


    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }


    public function messagesReceived()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
}


