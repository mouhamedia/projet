@extends('layouts.app')

@section('title', 'Contactez-nous - El Hadji Ahmad Dème')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-12">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-bold text-islamic">Entrer en contact</h1>
        <p class="text-gray-600 mt-2 italic">Pour toute question sur l'œuvre ou pour soutenir nos actions.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="md:col-span-1 space-y-8">
            <div class="flex items-start">
                <div class="bg-gold/10 p-3 rounded-lg text-gold mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-islamic uppercase text-sm">Adresse</h3>
                    <p class="text-gray-600">Quartier Escale, Sokone, Sénégal</p>
                </div>
            </div>

            <div class="flex items-start">
                <div class="bg-gold/10 p-3 rounded-lg text-gold mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-islamic uppercase text-sm">Email</h3>
                    <p class="text-gray-600">info@sokone-deme.sn</p>
                </div>
            </div>
        </div>

        <div class="md:col-span-2 bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nom complet</label>
                        <input type="text" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-gold focus:ring-0 outline-none transition" placeholder="Votre nom">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Téléphone</label>
                        <input type="text" name="phone" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-gold focus:ring-0 outline-none transition" placeholder="77 XXX XX XX">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Message</label>
                    <textarea name="message" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-gold focus:ring-0 outline-none transition" placeholder="Votre message..."></textarea>
                </div>
                <button type="submit" class="w-full bg-islamic text-white py-4 rounded-lg font-bold hover:bg-green-900 transition btn-pop">
                    Envoyer le message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection