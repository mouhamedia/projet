<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_id',
        'user_id',
        'user_ip',
    ];

    // Relation avec la vidéo
    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    // Relation avec l'utilisateur (facultatif si tu as users)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
