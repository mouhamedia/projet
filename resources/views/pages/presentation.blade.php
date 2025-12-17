@extends('layouts.app')

@section('title', 'Biographie de El Hadji Ahmad Dème - Le Savant de Sokone')

@section('content')
<div class="bg-gray-50 pb-20">
    <div class="bg-islamic text-white py-20 mb-16">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">El Hadji Ahmad Dème</h1>
            <p class="text-gold text-xl md:text-2xl font-serif italic tracking-widest uppercase">
                "Al-Arifou Billah" — Le Connaisseur en Dieu
            </p>
            <div class="w-24 h-1.5 bg-gold mx-auto mt-8 rounded-full"></div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        
        <div class="grid md:grid-cols-2 gap-16 items-center mb-32">
            <div class="relative">
                <div class="absolute -inset-4 bg-gold/20 rounded-2xl blur-xl rotate-3"></div>
                <img src="{{ asset('images/photo-deme.jpg') }}" 
                     alt="Portrait El Hadji Ahmad Dème" 
                     class="relative rounded-2xl shadow-2xl border-4 border-white object-cover w-full h-[600px]">
                <div class="absolute bottom-6 right-6 bg-gold text-white px-6 py-2 rounded-full font-bold shadow-lg">
                    1895 — 1973
                </div>
            </div>

            <div class="space-y-8">
                <h3 class="text-4xl text-islamic font-bold">Un Itinéraire de Lumière</h3>
                <div class="prose prose-lg text-gray-700 leading-relaxed">
                    <p>
                        Né à la fin du XIXe siècle, **El Hadji Ahmad Dème** a tracé un chemin exceptionnel dans l'histoire religieuse du Sénégal. Son éducation a commencé sous l'aile de son père avant qu'il ne s'engage dans une quête de savoir (la *Rihla*) qui l'a mené auprès des plus grands maîtres de son temps.
                    </p>
                    <p>
                        Installé à **Sokone** dans les années 1920, il a transformé ce village en un pôle d'attraction spirituelle. Son génie résidait dans l'équilibre parfait entre **le chapelet et la charrue**. Il enseignait que le musulman doit être autonome : il cultivait ses champs le jour avec ses disciples et rédigeait ses manuscrits la nuit à la lueur de la lampe.
                    </p>
                    <p>
                        Grand dignitaire de la **Tidjiniya**, il prônait une spiritualité basée sur l'amour du Prophète (PSL) et le respect strict de la Sharia, fuyant les honneurs mondains pour se consacrer à l'éducation.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[3rem] shadow-2xl border border-gray-100 overflow-hidden mb-32">
            <div class="bg-gold p-12 text-center text-white">
                <h2 class="text-5xl font-serif italic mb-4">Diyâ-u Nayyirayni</h2>
                <p class="text-xl opacity-90 tracking-wide uppercase font-bold">
                    L'Éclat des deux Luminaires (Le Coran et la Sunnah)
                </p>
            </div>

            <div class="p-8 md:p-16">
                <div class="grid md:grid-cols-2 gap-12 mb-16">
                    <div>
                        <h4 class="text-2xl font-bold text-islamic mb-6 border-b-2 border-gold pb-2 inline-block">Une Œuvre Monumentale</h4>
                        <p class="text-gray-700 text-lg leading-relaxed mb-6">
                            Le **Tafsir Diyâ-u Nayyirayni** est le fruit de plus de 20 ans de rédaction. C'est l'un des rares exégèses coraniques complets rédigés en Afrique de l'Ouest. Le titre fait référence aux deux sources de lumière dont s'est inspiré l'auteur : le Livre d'Allah et la tradition de Son Messager.
                        </p>
                        <ul class="space-y-4 text-gray-700">
                            <li class="flex items-start"><span class="text-gold mr-3">✔</span> <strong>Linguistique :</strong> Une analyse profonde de la grammaire arabe (*Nahw*).</li>
                            <li class="flex items-start"><span class="text-gold mr-3">✔</span> <strong>Jurisprudence :</strong> Des solutions juridiques adaptées à la réalité sociale.</li>
                            <li class="flex items-start"><span class="text-gold mr-3">✔</span> <strong>Spiritualité :</strong> Une dimension soufie qui nourrit l'âme.</li>
                        </ul>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-3xl border border-dashed border-gold/30">
                        <h4 class="text-2xl font-bold text-islamic mb-6">Reconnaissance Internationale</h4>
                        <p class="text-gray-600 italic leading-relaxed">
                            "Lorsque le manuscrit fut présenté aux érudits de l'université **Al-Azhar** au Caire et au Maroc, ils furent stupéfaits de la profondeur de ce savant venu de Sokone. L'œuvre a été saluée pour sa clarté et sa capacité à synthétiser des siècles de commentaires classiques (Tabari, Ibn Kathir) tout en apportant un regard neuf."
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="text-center p-6 bg-islamic/5 rounded-2xl">
                        <div class="text-3xl font-bold text-gold mb-1">20</div>
                        <div class="text-xs uppercase text-gray-500 font-bold">Volumes</div>
                    </div>
                    <div class="text-center p-6 bg-islamic/5 rounded-2xl">
                        <div class="text-3xl font-bold text-gold mb-1">1959</div>
                        <div class="text-xs uppercase text-gray-500 font-bold">Année d'achèvement</div>
                    </div>
                    <div class="text-center p-6 bg-islamic/5 rounded-2xl">
                        <div class="text-3xl font-bold text-gold mb-1">6666</div>
                        <div class="text-xs uppercase text-gray-500 font-bold">Versets commentés</div>
                    </div>
                    <div class="text-center p-6 bg-islamic/5 rounded-2xl">
                        <div class="text-3xl font-bold text-gold mb-1">78</div>
                        <div class="text-xs uppercase text-gray-500 font-bold">Ans de sagesse</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2 bg-islamic rounded-3xl p-12 text-white shadow-xl relative overflow-hidden">
                <div class="absolute bottom-0 right-0 opacity-10">
                    <span class="text-[150px] font-serif">"</span>
                </div>
                <h4 class="text-3xl font-bold mb-6 text-gold">La vision du Cheikh</h4>
                <p class="text-xl leading-relaxed italic mb-8">
                    « Le véritable savoir est celui qui transforme le comportement. Si la science ne mène pas à l'humilité et au service de l'autre, elle devient un voile entre l'homme et son Créateur. »
                </p>
                <p class="opacity-80">
                    Cette philosophie imprègne encore aujourd'hui la cité de Sokone, où l'enseignement reste gratuit et accessible à tous, sans distinction d'origine.
                </p>
            </div>
            
            <div class="bg-[#D4AF37] rounded-3xl p-10 text-white shadow-xl">
                <h4 class="text-2xl font-bold mb-6 uppercase tracking-tighter">L'Héritage Vivant</h4>
                <ul class="space-y-6">
                    <li class="border-b border-white/20 pb-4">
                        <span class="block font-bold text-lg">La Grande Mosquée</span>
                        <span class="text-sm opacity-90 text-white/80">Cœur battant de la spiritualité à Sokone.</span>
                    </li>
                    <li class="border-b border-white/20 pb-4">
                        <span class="block font-bold text-lg">Le Daara Moderne</span>
                        <span class="text-sm opacity-90 text-white/80">Allier mémorisation du Coran et éducation formelle.</span>
                    </li>
                    <li>
                        <span class="block font-bold text-lg">Le Ziarra Annuel</span>
                        <span class="text-sm opacity-90 text-white/80">Un moment d'unité pour des milliers de fidèles.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection