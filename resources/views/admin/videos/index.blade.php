@extends('layouts.app')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding: 40px 20px;">
    <div class="max-w-7xl mx-auto">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center text-[#065f46] font-bold no-underline mb-2 hover:text-[#D4AF37] transition">
                    <span class="mr-2 transform group-hover:-translate-x-1 transition">⬅</span> 
                    Retour au Dashboard
                </a>
                <h1 class="text-3xl font-bold text-[#065f46]">Médiathèque (Vidéos)</h1>
                <p class="text-gray-500">Gérez les conférences et leçons vidéo de la fondation</p>
            </div>
            
            <a href="{{ route('admin.videos.create') }}" 
               style="background-color: #D4AF37;" 
               class="text-white px-8 py-4 rounded-2xl font-bold hover:opacity-90 transition shadow-lg no-underline inline-block">
                + Ajouter une Vidéo
            </a>
        </div>

        @if(session('success'))
            <div style="background-color: #dcfce7; border-left: 4px solid #22c55e; color: #166534;" class="p-4 rounded-xl mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 text-gray-400 uppercase text-xs font-black tracking-widest">
                        <tr>
                            <th class="px-6 py-5">Aperçu</th>
                            <th class="px-6 py-5">Titre de la leçon</th>
                            <th class="px-6 py-5">Source</th>
                            <th class="px-6 py-5">Statistiques</th>
                            <th class="px-6 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($videos as $video)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-6 py-4">
                                <div class="w-24 h-14 bg-gray-900 rounded-lg flex items-center justify-center overflow-hidden shadow-inner border border-gray-200">
                                    @if(str_contains($video->video_url, 'youtube.com') || str_contains($video->video_url, 'youtu.be'))
                                        <span class="text-red-500 text-xl">▶️</span>
                                    @else
                                        <span class="text-blue-400 text-xl">📁</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 font-bold text-gray-800">
                                {{ $video->title ?? $video->titre }}
                            </td>
                            <td class="px-6 py-4">
                                @if(str_contains($video->video_url, 'youtube.com') || str_contains($video->video_url, 'youtu.be'))
                                    <span class="bg-red-50 text-red-600 px-3 py-1 rounded-full text-[10px] uppercase font-black border border-red-100">YouTube</span>
                                @else
                                    <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-[10px] uppercase font-black border border-blue-100">Fichier MP4</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <div class="flex items-center">
                                    <span class="mr-2">👁️</span> {{ $video->vues ?? 0 }} vues
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3">
                                    <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous vraiment supprimer cette vidéo ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-3 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition shadow-sm border-none cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($videos->isEmpty())
                <div class="p-20 text-center">
                    <div class="text-6xl mb-4">🎬</div>
                    <div class="text-gray-400 font-medium text-lg">Aucune vidéo dans la médiathèque.</div>
                    <a href="{{ route('admin.videos.create') }}" class="text-[#D4AF37] hover:underline mt-2 inline-block font-bold">Ajouter la première vidéo</a>
                </div>
            @endif
        </div>

        <div class="mt-10 text-center">
            <a href="/" class="text-gray-400 hover:text-[#065f46] text-sm no-underline transition flex items-center justify-center gap-2">
                🏠 Quitter l'admin et voir le site public
            </a>
        </div>
    </div>
</div>
@endsection