@extends('layouts.app')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding: 20px;">
    
    <div class="max-w-4xl mx-auto">
        
        <div class="flex justify-between items-center mb-8">
            <a href="{{ route('admin.dashboard') }}" 
               class="group flex items-center text-[#065f46] font-bold no-underline hover:text-[#D4AF37] transition duration-300">
                <div class="mr-3 bg-white p-2 rounded-full shadow-sm group-hover:shadow-md transition">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </div>
                <span>Retour au Tableau de Bord</span>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-5 py-2 rounded-xl text-sm font-bold shadow-md hover:bg-red-600 transition border-none cursor-pointer">
                    🚪 Quitter la session
                </button>
            </form>
        </div>

        <div class="bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-gray-200">
            
            <div style="background-color: #D4AF37; padding: 40px; text-align: center; color: white;">
                <h1 style="font-size: 28px; font-weight: 800; margin: 0; letter-spacing: -0.5px;">AJOUTER UNE NOUVELLE VIDÉO</h1>
                <p style="margin-top: 10px; opacity: 0.9; font-size: 14px; font-style: italic; letter-spacing: 1px;">Espace de gestion - Fondation El Hadji Ahmad Dème</p>
            </div>

            <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data" class="p-10 space-y-8">
                @csrf
                
                <div>
                    <label class="block text-gray-700 font-bold mb-2 uppercase text-xs tracking-widest">Titre de la vidéo</label>
                    <input type="text" name="title" required 
                        class="w-full px-5 py-4 rounded-2xl border-2 border-gray-100 focus:border-[#D4AF37] focus:bg-white outline-none transition bg-gray-50" 
                        placeholder="Ex: Conférence sur le Tafsir Diyâ-u Nayyirayni">
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2 uppercase text-xs tracking-widest">Lien YouTube (Format Web)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-red-500">▶</span>
                        <input type="url" name="video_url" 
                            class="w-full pl-10 pr-5 py-4 rounded-2xl border-2 border-gray-100 focus:border-[#D4AF37] outline-none transition bg-gray-50" 
                            placeholder="https://www.youtube.com/watch?v=...">
                    </div>
                    <p class="text-xs text-gray-400 mt-2 italic font-medium">Copiez l'URL complète depuis votre navigateur.</p>
                </div>

                <div class="relative flex py-5 items-center">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink mx-4 text-gray-400 text-xs font-bold uppercase tracking-widest">OU CHARGER UN FICHIER</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2 uppercase text-xs tracking-widest">Fichier Vidéo (MP4 uniquement)</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-2xl p-6 hover:border-[#D4AF37] transition bg-gray-50 text-center">
                        <input type="file" name="fichier" accept="video/*" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gold/10 file:text-gold hover:file:bg-gold/20">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" 
                            style="background-color: #065f46;" 
                            class="flex-1 text-white py-5 rounded-2xl font-black text-lg hover:opacity-90 transition shadow-xl border-none cursor-pointer uppercase tracking-widest">
                        Enregistrer la Vidéo
                    </button>
                    
                    <a href="{{ route('admin.dashboard') }}" 
                       class="px-10 py-5 bg-gray-100 text-gray-500 rounded-2xl font-bold hover:bg-gray-200 transition text-center no-underline">
                        Annuler
                    </a>
                </div>
            </form>
        </div>

        <div class="text-center mt-10">
            <a href="/" class="text-gray-400 hover:text-[#065f46] text-sm font-medium transition no-underline">
                🏠 Quitter l'administration et revenir à l'accueil du site
            </a>
        </div>
    </div>
</div>
@endsection