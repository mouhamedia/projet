@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
        <div class="bg-gold p-8 text-center text-white">
            <h1 class="text-3xl font-bold">Ajouter une Vidéo</h1>
            <p>Lien YouTube pour la médiathèque de la Fondation</p>
        </div>

        <form action="{{ route('admin.videos.store') }}" method="POST" class="p-8 space-y-6">
            @csrf
            
            <div>
                <label class="block text-gray-700 font-bold mb-2">Titre de la vidéo</label>
                <input type="text" name="title" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Lien YouTube (URL)</label>
                <input type="url" name="video_url" placeholder="https://www.youtube.com/watch?v=..." required 
                    class="w-full px-4 py-3 rounded-xl border border-gray-100 focus:border-gold outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Description (Optionnel)</label>
                <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-100 focus:border-gold outline-none"></textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-islamic text-white py-4 rounded-xl font-bold hover:bg-green-800 transition">
                    Enregistrer la vidéo
                </button>
                <a href="{{ route('admin.dashboard') }}" class="px-8 py-4 bg-gray-100 text-gray-500 rounded-xl font-bold">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection