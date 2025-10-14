<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Affiche le formulaire de modification du mot de passe.
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Met à jour le mot de passe de l'utilisateur.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'], // Vérifie que le mot de passe actuel est correct
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Nouveau mot de passe
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.edit')->with('status', 'Mot de passe mis à jour avec succès.');
    }
}
