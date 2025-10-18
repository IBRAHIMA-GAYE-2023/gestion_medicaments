<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\PriseMedicament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PriseMedicamentController extends Controller
{

    public function show($id)
    {
        $medicament = Medicament::findOrFail($id);
        return view('medicaments.details', compact('medicament'));
    }

    public function prendre(Request $request)
    {
        $request->validate([
            'medicament_id' => 'required|exists:medicaments,id',
            'quantite' => 'required|integer|min:1',
        ]);

        $medicament = Medicament::findOrFail($request->medicament_id);

        // Vérification du stock
        if ($medicament->stock < $request->quantite) {
            return back()->with('error', 'Stock insuffisant pour ce médicament.');
        }

        // Diminuer le stock
        $medicament->decrement('stock', $request->quantite);

        PriseMedicament::create([
            'user_id' => Auth::id(),
            'medicament_id' => $medicament->id,
            'quantite_pris' => $request->quantite,
        ]);

        return back()->with('success', 'Médicament pris avec succès ✅');
    }

    public function historique()
    {
        // Récupérer toutes les prises de l'utilisateur connecté
        $prises = PriseMedicament::where('user_id', Auth::id())
                    ->with('medicament')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('medicaments.historiques', compact('prises'));
    }
}
