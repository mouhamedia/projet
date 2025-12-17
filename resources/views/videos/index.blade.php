@extends('layouts.app')

@section('title', 'Médiathèque - Enseignements de El Hadji Ahmad Dème')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-bold text-islamic mb-4">Médiathèque Spirituelle</h1>
        <p class="text-gray-600 italic">Retrouvez les conférences, récitals et enseignements de Sokone.</p>
        <div class="w-24 h-1 bg-gold mx-auto mt-4"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach($videos as $video)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-300 group">
            <div class="relative h-52 bg-black flex items-center justify-center">
                <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/mqdefault.jpg" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition">
                <a href="{{ route('videos.show', $video->id) }}" class="absolute inset-0 flex items-center justify-center">
                    <div class="bg-gold p-4 rounded-full shadow-lg group-hover:scale-110 transition transform">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M4.5 3.5v13l11-6.5-11-6.5z"/></svg>
                    </div>
                </a>
            </div>
            
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2">{{ $video->title }}</h2>
                <p class="text-gray-500 text-sm mb-4 line-clamp-3">{{ $video->description }}</p>
                <div class="flex justify-between items-center text-xs text-islamic font-bold uppercase tracking-tighter">
                    <span>{{ $video->category ?? 'Enseignement' }}</span>
                    <span class="text-gray-400 font-normal italic">{{ $video->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-12">
        {{ $videos->links() }}
    </div>
</div>
@endsection