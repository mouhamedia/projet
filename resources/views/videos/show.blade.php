@extends('layouts.app')

@section('title', $video->title)

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
    <a href="{{ route('videos') }}" class="text-islamic mb-6 inline-flex items-center hover:text-gold transition font-bold uppercase text-xs tracking-widest">
        ← Retour à la médiathèque
    </a>

    <div class="bg-black rounded-3xl overflow-hidden shadow-2xl mb-8 aspect-video">
        <iframe class="w-full h-full" 
                src="https://www.youtube.com/embed/{{ $video->youtube_id }}?autoplay=1" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
        </iframe>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <h1 class="text-3xl font-bold text-islamic mb-4">{{ $video->title }}</h1>
        <div class="w-20 h-1 bg-gold mb-6"></div>
        <div class="prose prose-green max-w-none text-gray-700 leading-relaxed">
            {!! nl2br(e($video->description)) !!}
        </div>
    </div>
</div>
@endsection