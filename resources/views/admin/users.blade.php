@extends('layouts.app')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding: 40px 20px;">
    <div class="max-w-6xl mx-auto">
        
        <div class="flex justify-between items-center mb-8">
            <a href="{{ route('admin.dashboard') }}" class="group flex items-center text-[#065f46] font-bold no-underline hover:text-[#D4AF37] transition">
                <span class="mr-3 bg-white p-2 rounded-full shadow-sm group-hover:shadow-md transition">⬅</span>
                Retour au Dashboard
            </a>
            <h1 class="text-2xl font-black text-[#065f46] uppercase tracking-tighter">Gestion des Accès</h1>
        </div>

        @if(session('success'))
            <div style="background-color: #dcfce7; border-left: 4px solid #22c55e; color: #166534;" class="p-4 rounded-xl mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div style="background-color: #fee2e2; border-left: 4px solid #ef4444; color: #991b1b;" class="p-4 rounded-xl mb-6 shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden border border-gray-100">
                    <div style="background-color: #065f46; padding: 25px; text-align: center;">
                        <h2 style="color: white; font-size: 18px; margin: 0;">Nouvel Utilisateur</h2>
                    </div>
                    
                    <form action="{{ route('admin.users.store') }}" method="POST" class="p-6 space-y-4">
                        @csrf
                        <div>
                            <label class="block text-gray-600 font-bold mb-1 text-xs uppercase">Nom</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border-2 border-gray-50 focus:border-[#D4AF37] outline-none bg-gray-50">
                        </div>
                        <div>
                            <label class="block text-gray-600 font-bold mb-1 text-xs uppercase">Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border-2 border-gray-50 focus:border-[#D4AF37] outline-none bg-gray-50">
                        </div>
                        <div>
                            <label class="block text-gray-600 font-bold mb-1 text-xs uppercase">Mot de passe</label>
                            <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border-2 border-gray-50 focus:border-[#D4AF37] outline-none bg-gray-50">
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                            <input type="checkbox" name="is_admin" id="is_admin" class="w-5 h-5 text-[#065f46] border-gray-300 rounded focus:ring-[#065f46]">
                            <label for="is_admin" class="ml-3 text-sm font-bold text-gray-700">Définir comme Admin</label>
                        </div>
                        <button type="submit" style="background-color: #D4AF37;" class="w-full text-white py-4 rounded-xl font-bold shadow-lg border-none cursor-pointer hover:opacity-90 transition uppercase">
                            Créer le compte
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 text-gray-400 uppercase text-[10px] font-black tracking-widest">
                            <tr>
                                <th class="px-6 py-4">Utilisateur</th>
                                <th class="px-6 py-4">Rôle</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($users as $user)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-800">{{ $user->name }}</div>
                                    <div class="text-xs text-gray-400">{{ $user->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($user->is_admin)
                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-[10px] font-black uppercase">Administrateur</span>
                                    @else
                                        <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-[10px] font-black uppercase">Utilisateur</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    @if(auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition border-none cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                    @else
                                        <span class="text-xs italic text-gray-400">Moi</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection