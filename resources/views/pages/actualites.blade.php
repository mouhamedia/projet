@extends('layouts.app')

@section('title', 'Actualités - Fondation El Hadji Ahmad Dème')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
    <div class="mb-12">
        <h1 class="text-4xl font-bold text-islamic">Actualités & Événements</h1>
        <p class="text-gray-600 mt-2 text-lg">Suivez la vie de la communauté et les activités de la fondation à Sokone.</p>
        <div class="w-20 h-1 bg-gold mt-4"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($messages as $message)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl transition duration-300 flex flex-col">
                
                {{-- Partie Visuelle --}}
                @if($message->video_url)
                    @php
                        $videoId = null;
                        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $message->video_url, $matches)) {
                            $videoId = $matches[1];
                        }
                    @endphp
                    
                    @if($videoId)
                        <div class="aspect-video">
                            <iframe class="w-full h-full" 
                                src="https://www.youtube.com/embed/{{ $videoId }}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </div>
                    @endif
                @elseif($message->image)
                    <div class="h-64 overflow-hidden">
                        <img src="{{ asset('storage/' . $message->image) }}" class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
                    </div>
                @else
                    <div class="h-48 bg-islamic/10 flex items-center justify-center">
                        <span class="text-gold font-serif italic text-xl">Sokone Actualité</span>
                    </div>
                @endif
                
                {{-- Contenu --}}
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center text-xs text-gold font-bold mb-3 uppercase tracking-widest">
                        <span class="bg-gold/10 px-2 py-1 rounded">
                            {{ $message->video_url ? 'Médiathèque' : 'Communiqué' }}
                        </span>
                        <span class="ml-3 text-gray-400 font-normal italic">{{ $message->created_at->format('d M Y') }}</span>
                    </div>
                    
                    <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $message->title }}</h2>
                    <p class="text-gray-600 leading-relaxed mb-6 flex-grow">
                        {{ Str::limit($message->content, 120) }}
                    </p>
                    
                    {{-- CORRECTION ICI : Le lien dynamique --}}
                    <a href="{{ route('actualites.show', $message->id) }}" class="group text-islamic font-bold hover:text-gold transition flex items-center">
                        Lire la suite 
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 bg-white rounded-2xl border-2 border-dashed border-gray-200">
                <p class="text-gray-500 text-xl italic">Aucune actualité n'est publiée pour le moment.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $messages->links() }}
    </div>
</div>
@endsection