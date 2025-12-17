@extends('layouts.app')

@section('title', 'Hommage à El Hadji Ahmadou Dème - Le Savant de Sokone')

@section('content')
<div class="w-full bg-gray-50">
    
    <section class="relative max-w-7xl mx-auto px-4 py-12 md:py-24 overflow-hidden">
        <div class="flex flex-col md:flex-row items-center gap-12 relative z-10">
            
            <div class="w-full md:w-1/2 group">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gold/10 rounded-full blur-3xl group-hover:bg-gold/20 transition duration-700"></div>
                    <img src="{{ asset('images/photo-deme.jpg') }}" 
                         alt="El Hadji Ahmadou Dème" 
                         class="relative rounded-2xl shadow-2xl w-full border-b-8 border-r-8 border-gold transform group-hover:-translate-y-2 transition duration-500 object-cover aspect-[4/5]">
                </div>
            </div>

            <div class="w-full md:w-1/2 text-center md:text-left">
                <span class="inline-block px-4 py-1 rounded-full bg-gold/10 text-gold text-sm font-bold tracking-widest mb-4 uppercase">Patrimoine Islamique</span>
                <h1 class="text-5xl md:text-7xl text-islamic font-bold mb-6 leading-tight">
                    El Hadji <br> <span class="text-gold">Ahmadou Dème</span>
                </h1>
                <p class="text-xl text-gray-700 italic mb-8 leading-relaxed font-serif">
                    "Le Phare de Sokone", auteur du monument exégétique <span class="text-islamic font-bold">Diyâ-u Nayyirayni</span>.
                </p>
                <div class="h-1.5 w-24 bg-gold mx-auto md:mx-0 mb-8 rounded-full"></div>
                <p class="text-gray-600 mb-10 text-lg leading-relaxed text-justify">
                    Découvrez l'œuvre immense d'un savant dont la plume a illuminé les cœurs. Une vie dédiée à l'enseignement, à la piété et à l'unification des musulmans à travers une sagesse universelle.
                </p>
                <div class="flex flex-col sm:flex-row gap-5 justify-center md:justify-start">
                    <a href="{{ route('presentation') }}" class="bg-islamic text-white px-10 py-4 rounded-xl font-bold shadow-xl hover:bg-green-800 transition transform hover:scale-105">
                        Découvrir sa vie
                    </a>
                    <a href="{{ route('videos') }}" class="bg-white text-islamic border-2 border-islamic px-10 py-4 rounded-xl font-bold shadow-lg hover:bg-gray-50 transition transform hover:scale-105">
                        Médiathèque
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white border-y border-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-gold mb-1">20</div>
                    <div class="text-sm text-gray-500 uppercase tracking-widest font-bold">Volumes du Tafsir</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-islamic mb-1">1959</div>
                    <div class="text-sm text-gray-500 uppercase tracking-widest font-bold">Fin de l'Exégèse</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-gold mb-1">100+</div>
                    <div class="text-sm text-gray-500 uppercase tracking-widest font-bold">Poèmes & Écrits</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-islamic mb-1">Sokone</div>
                    <div class="text-sm text-gray-500 uppercase tracking-widest font-bold">Cité de Lumière</div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-islamic py-24 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
            </div>
        <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
            <span class="text-gold text-5xl font-serif">"</span>
            <p class="text-3xl md:text-5xl font-serif italic text-white mb-8 leading-tight">
                La connaissance sans la pratique est un arbre sans fruits.
            </p>
            <div class="inline-block px-6 py-2 border border-gold/30 rounded-full">
                <span class="text-gold font-bold tracking-[0.3em] uppercase text-sm">— El Hadji Ahmad Dème</span>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-24">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4">Un Héritage Multidimensionnel</h2>
            <p class="text-gray-500 italic">L'excellence au service de l'Islam et de l'Humanité</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="group p-10 bg-white shadow-sm rounded-3xl border border-gray-100 hover:border-gold transition duration-500 hover:shadow-2xl text-center">
                <div class="w-20 h-20 bg-gold/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:rotate-12 transition">
                    <span class="text-4xl">📚</span>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-islamic">Le Savant</h3>
                <p class="text-gray-600 leading-relaxed">Maître incontesté des sciences islamiques, il a formé des générations d'imams et d'érudits.</p>
            </div>

            <div class="group p-10 bg-white shadow-sm rounded-3xl border border-gray-100 hover:border-islamic transition duration-500 hover:shadow-2xl text-center">
                <div class="w-20 h-20 bg-islamic/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:rotate-12 transition">
                    <span class="text-4xl">🕌</span>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-islamic">Le Guide</h3>
                <p class="text-gray-600 leading-relaxed">Fondateur de la cité spirituelle de Sokone, un foyer ardent de culture et de paix sociale.</p>
            </div>

            <div class="group p-10 bg-white shadow-sm rounded-3xl border border-gray-100 hover:border-gold transition duration-500 hover:shadow-2xl text-center">
                <div class="w-20 h-20 bg-gold/10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:rotate-12 transition">
                    <span class="text-4xl">✍️</span>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-islamic">L'Écrivain</h3>
                <p class="text-gray-600 leading-relaxed">Le "Diyâ-u Nayyirayni", une œuvre colossale reconnue par les plus grandes universités islamiques.</p>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Médiathèque</h2>
                    <p class="text-gray-500">Dernières leçons et témoignages</p>
                </div>
                <a href="{{ route('videos') }}" class="text-islamic font-bold hover:underline">Tout voir →</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg group">
                    <div class="aspect-video bg-black flex items-center justify-center relative">
                        <span class="text-white opacity-50 text-6xl group-hover:scale-110 transition duration-500">▶</span>
                        </div>
                    <div class="p-6">
                        <h4 class="font-bold text-xl">Introduction au Tafsir</h4>
                        <p class="text-gray-500 text-sm mt-2">Documentaire sur l'œuvre majeure du Cheikh.</p>
                    </div>
                </div>
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg group">
                    <div class="aspect-video bg-black flex items-center justify-center relative">
                        <span class="text-white opacity-50 text-6xl group-hover:scale-110 transition duration-500">▶</span>
                    </div>
                    <div class="p-6">
                        <h4 class="font-bold text-xl">L'héritage de Sokone</h4>
                        <p class="text-gray-500 text-sm mt-2">Témoignages des contemporains et des fidèles.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection