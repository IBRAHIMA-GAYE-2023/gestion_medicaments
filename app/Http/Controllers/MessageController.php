<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{


    public function index()
    {
        $messages = Message::all();
        return view('admin.messages', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sender_id' => 'required',
            'content' => 'required|string',
            'receiver_id' => 'required|string',
            'is_read' => 'required|boolean',
            'typeMedicament' => 'required|string',
        ]);

        Message::create($request->all());

        return back()->with('success', 'Message envoyé avec succès.');
    }

}; 