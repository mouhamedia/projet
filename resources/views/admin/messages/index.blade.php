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
                <h1 class="text-3xl font-bold text-[#065f46]">Gestion des Actualités</h1>
                <p class="text-gray-500">Liste de tous les articles publiés sur le site</p>
            </div>
            
            <a href="{{ route('admin.messages.create') }}" 
               style="background-color: #D4AF37;" 
               class="text-white px-8 py-4 rounded-2xl font-bold hover:opacity-90 transition shadow-lg no-underline inline-block">
                + Nouvelle Publication
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
                            <th class="px-6 py-5">Titre & Contenu</th>
                            <th class="px-6 py-5">Date de Publication</th>
                            <th class="px-6 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($messages as $message)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-6 py-4">
                                @if($message->image)
                                    <img src="{{ asset('storage/' . $message->image) }}" class="w-20 h-12 object-cover rounded-lg shadow-sm border border-gray-100">
                                @else
                                    <div class="w-20 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-[10px] text-gray-400 italic">
                                        Sans image
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800 text-base mb-1">{{ $message->title }}</div>
                                <div class="text-sm text-gray-400 line-clamp-1">{{ Str::limit($message->content, 60) }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <span class="bg-gray-100 px-3 py-1 rounded-full">{{ $message->created_at->format('d M Y') }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('admin.messages.edit', $message) }}" 
                                       class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition shadow-sm"
                                       title="Modifier">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    
                                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline-block" onsubmit="return confirm('Attention : Cette action est irréversible. Supprimer cet article ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition shadow-sm border-none cursor-pointer">
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

            @if($messages->isEmpty())
                <div class="p-20 text-center">
                    <div class="text-6xl mb-4">📢</div>
                    <div class="text-gray-400 font-medium text-lg">Aucune actualité publiée pour le moment.</div>
                    <a href="{{ route('admin.messages.create') }}" class="text-[#D4AF37] hover:underline mt-2 inline-block font-bold">Publier le premier article</a>
                </div>
            @endif
        </div>

        <div class="mt-8 text-center">
            <a href="/" class="text-gray-400 hover:text-[#065f46] text-sm no-underline transition">
                🏠 Quitter l'admin et voir le site public
            </a>
        </div>
    </div>
</div>
@endsection