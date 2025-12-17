<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Photo;
use App\Models\Message;

class HomeController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->take(3)->get();      // 3 dernières vidéos
        $photos = Photo::latest()->take(6)->get();      // 6 dernières photos
        $messages = Message::latest()->take(5)->get();  // 5 derniers messages

        return view('pages.accueil', compact('videos', 'photos', 'messages'));
    }
}
