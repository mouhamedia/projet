<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoLike;
use App\Models\Video;

class VideoLikeController extends Controller
{
    public function like(Request $request, Video $video)
    {
        $userId = $request->user()->id ?? null;
        $userIp = $request->ip();

        // Vérifier si l'utilisateur ou IP a déjà liké
        $exists = VideoLike::where('video_id', $video->id)
                    ->where(function($q) use ($userId, $userIp) {
                        if($userId) $q->orWhere('user_id', $userId);
                        $q->orWhere('user_ip', $userIp);
                    })->exists();

        if(!$exists){
            VideoLike::create([
                'video_id' => $video->id,
                'user_id' => $userId,
                'user_ip' => $userIp,
            ]);
        }

        return redirect()->back();
    }
}
