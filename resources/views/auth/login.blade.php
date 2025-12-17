@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-islamic">
                Espace Administration
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Connectez-vous pour gérer le contenu de la Fondation
            </p>
            <div class="w-16 h-1 bg-gold mx-auto mt-4"></div>
        </div>

        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse Email</label>
                    <input id="email" name="email" type="email" required class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-islamic focus:border-islamic sm:text-sm" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-islamic focus:border-islamic sm:text-sm">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-islamic focus:ring-islamic border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">Se souvenir de moi</label>
                </div>

                @if (Route::has('password.request'))
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-gold hover:text-yellow-600">
                        Oublié ?
                    </a>
                </div>
                @endif
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-islamic hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-islamic transition shadow-lg">
                    Se connecter
                </button>
            </div>
        </form>
    </div>
</div>
@endsection