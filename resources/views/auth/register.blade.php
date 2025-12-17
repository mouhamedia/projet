@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-islamic">Créer un compte</h2>
            <p class="mt-2 text-sm text-gray-600 italic">Rejoignez la gestion de la communauté de Sokone</p>
            <div class="w-16 h-1 bg-gold mx-auto mt-4"></div>
        </div>

        <form class="mt-8 space-y-4" method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Nom Complet</label>
                <input name="name" type="text" required class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 text-gray-900 focus:outline-none focus:ring-islamic focus:border-islamic sm:text-sm" value="{{ old('name') }}">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Adresse Email</label>
                <input name="email" type="email" required class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 text-gray-900 focus:outline-none focus:ring-islamic focus:border-islamic sm:text-sm" value="{{ old('email') }}">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input name="password" type="password" required class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 text-gray-900 focus:outline-none focus:ring-islamic focus:border-islamic sm:text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Confirmation</label>
                    <input name="password_confirmation" type="password" required class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 text-gray-900 focus:outline-none focus:ring-islamic focus:border-islamic sm:text-sm">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-islamic hover:bg-green-800 shadow-lg transition">
                    Créer le compte
                </button>
            </div>
        </form>
    </div>
</div>
@endsection