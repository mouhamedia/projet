@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <div class="w-64 bg-[#065f46] text-white hidden md:block shadow-2xl">
        <div class="p-6 font-bold text-xl border-b border-white/10 text-[#D4AF37] tracking-widest uppercase">
            Administration
        </div>
        <nav class="mt-6 space-y-2 px-4">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center py-2.5 px-4 rounded bg-white/10 text-[#D4AF37]">
                <span class="mr-3">📊</span> Tableau de bord
            </a>
            <a href="{{ route('admin.messages.index') }}" class="flex items-center py-2.5 px-4 rounded hover:bg-white/10 transition">
                <span class="mr-3">📰</span> Gérer Actualités
            </a>
            <a href="{{ route('admin.videos.index') }}" class="flex items-center py-2.5 px-4 rounded hover:bg-white/10 transition">
                <span class="mr-3">🎥</span> Gérer Vidéos
            </a>
            <a href="{{ route('admin.users.index') }}" class="flex items-center py-2.5 px-4 rounded hover:bg-white/10 transition">
                <span class="mr-3">👥</span> Utilisateurs
            </a>
        </nav>
    </div>

    <div class="flex-1 p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Bienvenue, {{ Auth::user()->name }}</h1>
            <span class="text-sm text-gray-500 font-medium bg-white px-4 py-2 rounded-full shadow-sm border">
                Aujourd'hui : {{ now()->format('d/m/Y') }}
            </span>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-[#065f46] hover:shadow-md transition">
                <div class="text-gray-500 text-sm uppercase font-bold tracking-wider">Actualités</div>
                <div class="text-3xl font-bold text-[#065f46] mt-1">
                    {{ $countMessages ?? 0 }} <span class="text-lg font-normal text-gray-400">Articles</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-[#D4AF37] hover:shadow-md transition">
                <div class="text-gray-500 text-sm uppercase font-bold tracking-wider">Vidéos</div>
                <div class="text-3xl font-bold text-[#D4AF37] mt-1">
                    {{ $countVideos ?? 0 }} <span class="text-lg font-normal text-gray-400">Leçons</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500 hover:shadow-md transition">
                <div class="text-gray-500 text-sm uppercase font-bold tracking-wider">Membres</div>
                <div class="text-3xl font-bold text-blue-500 mt-1">
                    {{ $countAdmins ?? 0 }} <span class="text-lg font-normal text-gray-400">Admins</span>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-xl font-bold mb-6 text-gray-700 flex items-center">
                <span class="mr-2">⚡</span> Actions rapides
            </h2>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('admin.messages.create') }}" class="flex-1 md:flex-none text-center bg-[#065f46] text-white px-8 py-4 rounded-xl font-bold hover:opacity-90 transition shadow-lg">
                    + Publier une actualité
                </a>
                 </a>
                <a href="{{ route('admin.videos.create') }}" class="flex-1 md:flex-none text-center bg-[#D4AF37] text-white px-8 py-4 rounded-xl font-bold hover:opacity-90 transition shadow-lg">
                    + Ajouter une vidéo
                </a>
            </div>
        </div>
        
        <p class="mt-8 text-center text-gray-400 text-sm">
            Portail Officiel El Hadji Ahmad Dème - Administration v1.0
        </p>
    </div>
</div>
@endsection