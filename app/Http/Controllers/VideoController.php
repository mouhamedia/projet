<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    // 1. Liste des vidéos (Admin)
    public function adminIndex()
    {
        $videos = Video::latest()->get();
        return view('admin.videos.index', compact('videos'));
    }

    // 2. Afficher le formulaire de création
    public function create()
    {
        return view('admin.videos.create');
    }

    // 3. Enregistrer la vidéo (Version sans user_id pour éviter l'erreur SQL)
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'video_url' => 'nullable|url',
            'fichier'   => 'nullable|file|mimes:mp4,mov,avi|max:50000',
        ]);

        // On prépare les données pour les colonnes RÉELLES de votre table
        $data = [
            'titre' => $request->title,
            'vues'  => 0,
        ];

        // Si on a un lien YouTube, on le met dans la colonne 'fichier'
        if ($request->video_url) {
            $data['fichier'] = $request->video_url;
        }

        // Si on a un fichier physique, il remplace le lien
        if ($request->hasFile('fichier')) {
            $data['fichier'] = $request->file('fichier')->store('videos', 'public');
        }

        // Création sans 'user_id' pour ne plus avoir l'erreur "Column not found"
        Video::create($data);

        return redirect()->route('admin.videos.index')->with('success', 'Vidéo enregistrée !');
    }

    // 4. Supprimer une vidéo
    public function destroy(Video $video)
    {
        if ($video->fichier && !str_contains($video->fichier, 'http')) {
            Storage::disk('public')->delete($video->fichier);
        }

        $video->delete();
        return redirect()->back()->with('success', 'Vidéo supprimée');
    }

    // --- PARTIE PUBLIQUE ---
    public function index()
    {
        $videos = Video::latest()->paginate(9);
        return view('pages.videos', compact('videos'));
    }

    public function show(Video $video)
    {
        $video->incrementViews();
        return view('pages.videos_show', compact('video'));
    }
}