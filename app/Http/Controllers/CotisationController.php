<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotisation;

class CotisationController extends Controller
{
    // Liste des cotisations
    public function index()
    {
        $cotisations = Cotisation::all();
        $total = Cotisation::where('status', 'success')->sum('montant');
        return view('cotisations.index', compact('cotisations', 'total'));
    }

    // Ajouter une cotisation manuellement (admin)
    public function store(Request $request)
    {
        $request->validate([
            'nom_contributeur' => 'required|string|max:255',
            'montant' => 'required|numeric|min:1',
        ]);

        Cotisation::create([
            'nom_contributeur' => $request->nom_contributeur,
            'montant' => $request->montant,
            'date_cotisation' => now(),
            'status' => 'success', // paiement manuel validé
        ]);

        return redirect()->back()->with('success', 'Cotisation ajoutée');
    }

    // Supprimer une cotisation (admin)
    public function destroy(Cotisation $cotisation)
    {
        $cotisation->delete();
        return redirect()->back()->with('success', 'Cotisation supprimée');
    }
}
