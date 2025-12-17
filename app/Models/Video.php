<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    // IMPORTANT : Ajoutez 'user_id' et 'video_url' ici
    protected $fillable = [
        'titre',      // Le nom dans votre base de données
        'video_url',  // Pour stocker le lien YouTube
        'fichier',    // Pour stocker le chemin du fichier MP4
        'vues',
        'user_id',    // Pour savoir quel admin a posté
    ];

    // Relation avec les likes
    public function likes()
    {
        return $this->hasMany(VideoLike::class);
    }

    // Ajouter une vue
    public function incrementViews()
    {
        $this->increment('vues');
    }

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}