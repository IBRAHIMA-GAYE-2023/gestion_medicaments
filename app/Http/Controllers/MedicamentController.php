<?php
namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    public function index()
    {

        $medicaments = Medicament::all();
        $totalMedicaments = $medicaments->count();

        return view('admin.medicaments.index', compact('medicaments', 'totalMedicaments'));
    }

    public function dashboardAdmin()
    {
        
        $medicaments = Medicament::all();
        $totalMedicaments = $medicaments->count();

        return view('admin.dashboardAdmin', compact('medicaments', 'totalMedicaments'));
    }


    public function create()
    {
        return view('admin.medicaments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'stock' => 'required|integer',
            'heure_a_prendre' => 'required|date_format:H:i',
            'details' => 'nullable|string',
        ]);

        Medicament::create($request->all());
        return redirect()->route('medicaments.index')->with('success', 'Médicament ajouté avec succès.');
    }

    public function edit(Medicament $medicament)
    {
        return view('admin.medicaments.edit', compact('medicament'));
    }

    public function update(Request $request, Medicament $medicament)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'stock' => 'required|integer',
            'heure_a_prendre' => 'required|date_format:H:i',
            'details' => 'nullable|string',
        ]);

        $medicament->update($request->all());
        return redirect()->route('medicaments.index')->with('success', 'Médicament mis à jour avec succès.');
    }

    public function destroy(Medicament $medicament)
    {
        $medicament->delete();
        return redirect()->route('medicaments.index')->with('success', 'Médicament supprimé avec succès.');
    }
}