<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    // --- PARTIE PUBLIQUE (Route: /actualites) ---
    public function index()
    {
        $messages = Message::latest()->paginate(6);
        return view('pages.actualites', compact('messages'));
    }

    // --- PARTIE ADMIN (Route: /admin/messages) ---
    public function adminIndex()
    {
        $messages = Message::latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function create()
    {
        return view('admin.messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'video_url']);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('messages', 'public');
        }

        Message::create($data);

        return redirect()->route('admin.messages.index')->with('success', 'Publication réussie !');
    }

    public function edit(Message $message)
    {
        return view('admin.messages.edit', compact('message'));
    }

    public function update(Request $request, Message $message)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'video_url']);

        if ($request->hasFile('image')) {
            if ($message->image) {
                Storage::disk('public')->delete($message->image);
            }
            $data['image'] = $request->file('image')->store('messages', 'public');
        }

        $message->update($data);

        return redirect()->route('admin.messages.index')->with('success', 'Mise à jour effectuée');
    }

    public function destroy(Message $message)
    {
        if ($message->image) {
            Storage::disk('public')->delete($message->image);
        }
        
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Suppression réussie');
    }
    public function show($id)
{
    // On récupère le message par son ID ou on renvoie une erreur 404
    $message = Message::findOrFail($id); 

    // On retourne la vue de détail (que nous allons créer juste après)
    return view('actualite-detail', compact('message'));
}
}