@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen pb-20">
    <div class="bg-islamic py-16 text-center text-white">
        <h1 class="text-4xl font-bold mb-4">Médiathèque Vidéo</h1>
        <p class="max-w-2xl mx-auto px-4 text-white/80">Retrouvez toutes les conférences, leçons et interventions de la Fondation El Hadji Ahmad Dème.</p>
    </div>

    <div class="max-w-7xl mx-auto px-4 mt-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($videos as $video)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative aspect-video bg-black flex items-center justify-center group">
                        @if(str_contains($video->fichier, 'youtube.com') || str_contains($video->fichier, 'youtu.be'))
                            @php
                                // Extraction simple de l'ID YouTube pour la miniature
                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->fichier, $match);
                                $youtubeId = $match[1] ?? null;
                            @endphp
                            @if($youtubeId)
                                <img src="https://img.youtube.com/vi/{{ $youtubeId }}/mqdefault.jpg" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition">
                            @endif
                        @else
                            <div class="text-white text-center">
                                <span class="text-4xl">🎥</span>
                                <p class="text-xs mt-2 uppercase tracking-widest text-gray-400">Vidéo Locale</p>
                            </div>
                        @endif
                        
                        <a href="{{ route('videos.show', $video) }}" class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-gold/90 rounded-full flex items-center justify-center text-white text-2xl shadow-lg transform group-hover:scale-110 transition">
                                ▶
                            </div>
                        </a>
                    </div>

                    <div class="p-6">
                        <h3 class="font-bold text-xl text-gray-800 mb-2 line-clamp-2 h-14">
                            {{ $video->titre }}
                        </h3>
                        <div class="flex justify-between items-center text-sm text-gray-500">
                            <span>{{ $video->created_at->format('d M Y') }}</span>
                            <span class="flex items-center">
                                <span class="mr-1">👁️</span> {{ $video->vues }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-gray-400 italic text-xl">Aucune vidéo disponible pour le moment.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $videos->links() }}
        </div>
    </div>
</div>
@endsection