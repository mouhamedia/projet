@extends('layouts.app')

@section('title', $message->title)

@section('content')
<article class="max-w-4xl mx-auto px-4 py-12 animate-fadeIn">
    {{-- Bouton Retour --}}
    <a href="{{ route('actualites') }}" class="text-gold hover:underline flex items-center mb-8 font-medium">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Retour aux actualités
    </a>

    {{-- En-tête de l'article --}}
    <header class="mb-10">
        <h1 class="text-4xl md:text-5xl font-bold text-islamic mb-4">{{ $message->title }}</h1>
        <div class="flex items-center text-gray-500 italic">
            <span class="bg-gold/10 text-gold px-3 py-1 rounded-full text-sm font-bold not-italic mr-4">
                {{ $message->video_url ? 'VIDÉO' : 'COMMUNIQUÉ' }}
            </span>
            Posté le {{ $message->created_at->format('d F Y') }}
        </div>
    </header>

    {{-- Visuel principal (Image ou Vidéo) --}}
    <div class="mb-12 rounded-3xl overflow-hidden shadow-2xl">
        @if($message->video_url)
            <div class="aspect-video">
                @php
                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $message->video_url, $matches);
                    $videoId = $matches[1] ?? null;
                @endphp
                <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
            </div>
        @elseif($message->image)
            <img src="{{ asset('storage/' . $message->image) }}" class="w-full h-auto object-cover">
        @endif
    </div>

    {{-- Corps de l'article --}}
    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
        {!! nl2br(e($message->content)) !!}
    </div>
</article>
@endsection