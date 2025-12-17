<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Ajout de 'image' et 'video_url' pour autoriser leur enregistrement
    protected $fillable = [
        'title', 
        'content', 
        'user_id', 
        'image', 
        'video_url'
    ];

    /**
     * Relation : Un message appartient à un utilisateur (l'admin qui publie)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}