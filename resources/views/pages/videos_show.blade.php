@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-5xl mx-auto px-4">
        
        <a href="{{ route('videos') }}" class="inline-flex items-center text-islamic font-bold mb-6 hover:underline">
            ← Retour à la médiathèque
        </a>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="relative aspect-video bg-black">
                @if(str_contains($video->fichier, 'youtube.com') || str_contains($video->fichier, 'youtu.be'))
                    @php
                        // Conversion de l'URL YouTube en format "embed"
                        $url = $video->fichier;
                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                        $youtubeId = $match[1] ?? null;
                    @endphp

                    @if($youtubeId)
                        <iframe class="absolute inset-0 w-full h-full" 
                                src="https://www.youtube.com/embed/{{ $youtubeId }}?autoplay=1" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    @else
                        <div class="flex items-center justify-center h-full text-white">Lien YouTube invalide</div>
                    @endif
                @else
                    <video class="absolute inset-0 w-full h-full" controls autoplay>
                        <source src="{{ asset('storage/' . $video->fichier) }}" type="video/mp4">
                        Votre navigateur ne supporte pas la lecture de vidéos.
                    </video>
                @endif
            </div>

            <div class="p-8">
                <div class="flex justify-between items-start mb-4">
                    <h1 class="text-3xl font-bold text-gray-800">{{ $video->titre }}</h1>
                    <div class="bg-gray-100 px-4 py-2 rounded-full text-gray-600 text-sm font-bold">
                        👁️ {{ $video->vues }} vues
                    </div>
                </div>

                <div class="flex items-center text-gray-500 text-sm mb-6 border-b pb-6">
                    <span class="mr-4">📅 Publié le {{ $video->created_at->format('d F Y') }}</span>
                    <span>📁 Catégorie : Médiathèque</span>
                </div>

                <div class="prose max-w-none text-gray-700">
                    <p>Bienvenue sur l'espace de diffusion de la Fondation El Hadji Ahmad Dème. Cette vidéo fait partie de nos archives religieuses et culturelles.</p>
                </div>
            </div>
        </div>

        <div class="mt-10">
            <h2 class="text-xl font-bold mb-6 text-gray-800">Autres vidéos suggérées</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Vous pourrez ajouter ici une boucle pour d'autres vidéos --}}
            </div>
        </div>
    </div>
</div>
@endsection