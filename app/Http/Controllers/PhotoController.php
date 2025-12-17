<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    // ------------------- Partie publique -------------------
    public function index()
    {
        $photos = Photo::latest()->paginate(12); // 12 photos par page
        return view('photos.index', compact('photos'));
    }

    // ------------------- Partie admin -------------------
    public function adminIndex()
    {
        $photos = Photo::latest()->get();
        return view('admin.photos', compact('photos'));
    }

    public function create()
    {
        return view('admin.create_photo');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|image|max:5120', // max 5MB
            'description' => 'nullable|string',
        ]);

        $filePath = $request->file('file')->store('photos', 'public');

        Photo::create([
            'title' => $request->title,
            'file_path' => $filePath,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.photos')->with('success', 'Photo ajoutée');
    }

    public function edit(Photo $photo)
    {
        return view('admin.edit_photo', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|image|max:5120',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('file')) {
            // Supprime l'ancien fichier
            Storage::disk('public')->delete($photo->file_path);
            $photo->file_path = $request->file('file')->store('photos', 'public');
        }

        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->save();

        return redirect()->route('admin.photos')->with('success', 'Photo modifiée');
    }

    public function destroy(Photo $photo)
    {
        Storage::disk('public')->delete($photo->file_path);
        $photo->delete();

        return redirect()->route('admin.photos')->with('success', 'Photo supprimée');
    }
}
