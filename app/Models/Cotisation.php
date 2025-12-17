<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_contributeur',
        'montant',
        'date_cotisation',
        'payment_provider',
        'transaction_id',
        'status',
    ];

    // Vérifier si la cotisation est payée
    public function isPaid()
    {
        return $this->status === 'success';
    }
}
