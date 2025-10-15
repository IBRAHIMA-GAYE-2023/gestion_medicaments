<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.messages', compact('messages'));
    }

    public function formMessage()
    {
        return view('user.envoyerMessage');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'typeMedicament' => 'required|string',
        ]);

        // Assurez-vous que l'utilisateur est connecté
        $senderId = auth()->id();

        // Récupération d'un infirmier (supposé avoir le rôle 'infirmier')
        $infirmier = User::where('role', 'admin')->first();

        if (!$infirmier) {
            return back()->withErrors('Aucun infirmier disponible pour recevoir le message.');
        }

        // Création du message
        Message::create([
            'sender_id' => $senderId,
            'receiver_id' => $infirmier->id,
            'content' => $request->content,
            'typeMedicament' => $request->typeMedicament,
            'is_read' => false,
        ]);

        return back()->with('success', 'Message envoyé avec succès.');
    }
}
