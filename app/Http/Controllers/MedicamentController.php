<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    public function index()
    {
        // Affiche uniquement les médicaments de l'utilisateur connecté
        $medicaments = Medicament::where('user_id', auth()->id())->get();
        return view('medicaments.index', compact('medicaments'));
    }

    public function create()
    {
        return view('medicaments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'frequence' => 'required|string|max:255',
            'duree' => 'nullable|string|max:255',
        ]);

        Medicament::create([
            'nom' => $request->nom,
            'dosage' => $request->dosage,
            'frequence' => $request->frequence,
            'duree' => $request->duree,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('medicaments.index')
                         ->with('success', 'Médicament ajouté avec succès');
    }

    public function edit(Medicament $medicament)
    {
        $this->authorize('update', $medicament); // sécurité
        return view('medicaments.edit', compact('medicament'));
    }

    public function update(Request $request, Medicament $medicament)
    {
        $this->authorize('update', $medicament);

        $request->validate([
            'nom' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'frequence' => 'required|string|max:255',
            'duree' => 'nullable|string|max:255',
        ]);

        $medicament->update($request->all());

        return redirect()->route('medicaments.index')
                         ->with('success', 'Médicament mis à jour');
    }

    public function destroy(Medicament $medicament)
    {
        $this->authorize('delete', $medicament);

        $medicament->delete();
        return redirect()->route('medicaments.index')
                         ->with('success', 'Médicament supprimé');
    }
}
