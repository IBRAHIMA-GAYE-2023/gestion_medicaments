<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Admin : liste tous les messages reçus par l'admin
    public function index()
    {
        $messages = Message::where('receiver_id', auth()->id())->get();
        return view('admin.messages', compact('messages'));
    }

    // Étudiant : formulaire pour envoyer un message
    public function formMessage()
    {
        return view('user.envoyerMessage');
    }

    // Étudiant : voir ses messages avec réponses
    public function messageRecu()
    {
        $messages = Message::where('sender_id', auth()->id())
                           ->orWhere('receiver_id', auth()->id())
                           ->get();
        return view('user.messageRecu', compact('messages'));
    }

    // Étudiant : envoyer un message
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'typeMedicament' => 'required|string',
        ]);

        $senderId = auth()->id();
        $infirmier = User::where('role', 'admin')->first();

        if (!$infirmier) {
            return back()->withErrors('Aucun infirmier disponible pour recevoir le message.');
        }

        Message::create([
            'sender_id' => $senderId,
            'receiver_id' => $infirmier->id,
            'content' => $request->content,
            'typeMedicament' => $request->typeMedicament,
            'is_read' => false,
        ]);

        return redirect()->route('messagesRecu')->with('success', 'Message envoyé avec succès.');
    }

    // Admin : répondre à un message
    public function repondre(Request $request, Message $message)
    {
        $request->validate([
            'reply' => 'required|string|max:1000',
        ]);

        $message->update([
            'reply' => $request->reply,
            'is_read' => true,
        ]);

        return back()->with('success', 'Réponse envoyée avec succès.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return back()->with('success', 'Message supprimé avec succès.');
    }

}
