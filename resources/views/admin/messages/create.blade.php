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
                <span>Retour au Dashboard</span>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-5 py-2 rounded-xl text-sm font-bold shadow-md hover:bg-red-600 transition border-none cursor-pointer">
                    🚪 Sortie
                </button>
            </form>
        </div>

        <div class="bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-gray-100">
            
            <div style="background-color: #065f46; padding: 40px; text-align: center; color: white;">
                <h1 style="font-size: 28px; font-weight: 800; margin: 0; color: white;">PUBLIER UNE ACTUALITÉ</h1>
                <p style="margin-top: 10px; color: #D4AF37; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                    Information & Communiqués
                </p>
            </div>

            <form action="{{ route('admin.messages.store') }}" method="POST" enctype="multipart/form-data" class="p-10 space-y-8">
                @csrf
                
                <div>
                    <label class="block text-gray-700 font-bold mb-2 uppercase text-xs tracking-widest">Titre de l'article</label>
                    <input type="text" name="title" required 
                        class="w-full px-5 py-4 rounded-2xl border-2 border-gray-100 focus:border-[#065f46] outline-none transition bg-gray-50" 
                        placeholder="Ex: Célébration du Gamou à Sokone...">
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2 uppercase text-xs tracking-widest">Image d'illustration (Optionnel)</label>
                    <div class="relative border-2 border-dashed border-gray-200 rounded-2xl p-8 hover:border-[#D4AF37] transition group text-center bg-gray-50">
                        <input type="file" name="image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <div class="space-y-3">
                            <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-[#D4AF37] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-sm font-medium text-gray-500">Cliquez pour ajouter une photo ou glissez-déposez</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2 uppercase text-xs tracking-widest">Contenu du message</label>
                    <textarea name="content" rows="12" required 
                        class="w-full px-5 py-4 rounded-2xl border-2 border-gray-100 focus:border-[#065f46] outline-none transition bg-gray-50" 
                        placeholder="Détaillez votre actualité ici..."></textarea>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" 
                            style="background-color: #065f46;" 
                            class="flex-1 text-white py-5 rounded-2xl font-black text-lg hover:opacity-90 transition shadow-xl border-none cursor-pointer uppercase">
                        Confirmer la publication
                    </button>
                    
                    <a href="{{ route('admin.dashboard') }}" 
                       class="px-10 py-5 bg-gray-100 text-gray-500 rounded-2xl font-bold hover:bg-gray-200 transition text-center no-underline">
                        Annuler
                    </a>
                </div>
            </form>
        </div>

        <div class="text-center mt-10">
            <a href="/" class="text-gray-400 hover:text-[#065f46] text-sm font-medium transition no-underline flex items-center justify-center">
                🏠 Retour au site public
            </a>
        </div>
    </div>
</div>
@endsection