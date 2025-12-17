<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotisation;
use Illuminate\Support\Facades\Http;

class PaiementController extends Controller
{
    // Initier le paiement
    public function initier(Request $request)
    {
        $request->validate([
            'nom_contributeur' => 'required|string|max:255',
            'montant' => 'required|numeric|min:1',
        ]);

        // Appel API Wave / Orange Money
        // $response = Http::withHeaders([...])->post('URL_API', [...]);

        $transaction_id = 'TEMP123'; // temporaire pour test

        $cotisation = Cotisation::create([
            'nom_contributeur' => $request->nom_contributeur,
            'montant' => $request->montant,
            'date_cotisation' => now(),
            'payment_provider' => 'wave', // ou 'orange'
            'transaction_id' => $transaction_id,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Paiement initié',
            'transaction_id' => $transaction_id,
            'cotisation_id' => $cotisation->id,
        ]);
    }

    // Webhook API pour mettre à jour le statut du paiement
    public function webhook(Request $request)
    {
        $transaction_id = $request->transaction_id;
        $status = $request->status; // success, failed

        $cotisation = Cotisation::where('transaction_id', $transaction_id)->first();

        if($cotisation){
            $cotisation->status = $status;
            $cotisation->save();
        }

        return response()->json(['message' => 'Webhook reçu']);
    }
}
