<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'El Hadji Ahmad Dème')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@300;400;700&family=Amiri:wght@700&display=swap" rel="stylesheet">
    
    <style>
        :root { --islamic-green: #004d00; --gold: #D4AF37; }
        body { font-family: 'Roboto', sans-serif; background: #fdfdfd; color: #1a1a1a; overflow-x: hidden; }
        h1, h2, h3 { font-family: 'Playfair Display', serif; }
        .text-gold { color: var(--gold); }
        .bg-islamic { background-color: var(--islamic-green); }
        
        .glass {
            background: rgba(0, 77, 0, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 2px solid var(--gold);
        }

        .animate-fadeIn { animation: fadeIn 0.8s ease-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        #mobile-menu { transition: all 0.3s ease-in-out; max-height: 0; overflow: hidden; }
        #mobile-menu.open { max-height: 500px; padding-bottom: 20px; }
    </style>
</head>
<body class="bg-gray-50">

    <nav class="glass sticky top-0 z-50 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 md:h-24">
                
                <div class="flex flex-col">
                    <span class="text-gold text-2xl md:text-3xl font-bold tracking-tight leading-none">
                        El Hadji Ahmad Dème
                    </span>
                    <span class="text-[10px] md:text-xs uppercase tracking-[0.3em] text-white/70 mt-1">
                        Sokone - Sénégal
                    </span>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-white hover:text-gold transition font-medium">Accueil</a>
                    <a href="/presentation" class="text-white hover:text-gold transition font-medium">L'Œuvre</a>
                    <a href="/actualites" class="text-white hover:text-gold transition font-medium">Actualités</a>
                    <a href="/videos" class="text-white hover:text-gold transition font-medium">Médiathèque</a>
                    
                    @auth
                        @if(Auth::user()->is_admin)
                            <a href="/admin/dashboard" class="text-gold border border-gold px-3 py-1 rounded hover:bg-gold hover:text-white transition text-sm font-bold">ADMIN</a>
                        @endif

                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="text-red-400 hover:text-red-600 text-sm font-bold uppercase tracking-tighter">
                            Quitter
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                    @else
                        <a href="/contact" class="bg-gold text-islamic px-5 py-2 rounded-lg transition font-bold">Contact</a>
                    @endauth
                </div>

                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gold p-2">
                        <svg id="menu-icon" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="md:hidden bg-[#003300] px-4">
            <a href="/" class="block text-white py-4 border-b border-white/5">Accueil</a>
            <a href="/presentation" class="block text-white py-4 border-b border-white/5">L'Œuvre</a>
            @auth
                @if(Auth::user()->is_admin)
                    <a href="/admin/dashboard" class="block text-gold py-4 border-b border-white/5 font-bold italic">Tableau de Bord Admin</a>
                @endif
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block text-red-400 py-4">Déconnexion</a>
            @else
                <a href="/contact" class="block text-gold py-4 font-bold italic">Nous contacter</a>
            @endauth
        </div>
    </nav>

    <main class="min-h-screen">
        <div class="animate-fadeIn">
            @yield('content')
        </div>
    </main>

    <footer class="bg-[#002200] text-white border-t-4 border-gold mt-20">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
                <div>
                    <h3 class="text-gold text-xl font-bold mb-4 uppercase tracking-wider">El Hadji Ahmad Dème</h3>
                    <p class="text-gray-400 text-sm">Portail officiel dédié à la diffusion du savoir de Cheikh Al Islam.</p>
                </div>
                <div>
                    <h3 class="text-white text-lg font-bold mb-4 border-b border-gold/30 pb-2 inline-block">Sokone</h3>
                    <p class="text-gray-400 text-sm italic">Quartier Escale, Sokone, Sénégal</p>
                </div>
                <div class="flex flex-col md:items-end">
                    <h3 class="text-white text-lg font-bold mb-4 border-b border-gold/30 pb-2 inline-block">Espace</h3>
                    @guest
                        <a href="/login" class="text-white/20 hover:text-white text-[10px] uppercase">Connexion Admin</a>
                    @endguest
                </div>
            </div>
            <div class="text-center mt-12 text-gray-500 text-[10px] uppercase tracking-widest">
                © {{ date('Y') }} El Hadji Ahmad Dème. Tous droits réservés.
            </div>
        </div>
    </footer>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            const isOpen = mobileMenu.classList.contains('open');
            menuToggle.innerHTML = isOpen 
                ? '<svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>'
                : '<svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>';
        });
    </script>
</body>
</html>