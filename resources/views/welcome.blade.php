@extends('layouts.app')

@section('content')
<!-- Import Tailwind (plus fluide pour le design moderne) -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
    .bg-vert {
        background-color: #2ECC71;
    }

    .bg-vert-clair {
        background-color: #E9F7EF;
    }

    .text-vert {
        color: #2ECC71;
    }

    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 8px 20px rgba(46, 204, 113, 0.25);
    }
</style>

{{-- HEADER --}}
<section class="bg-vert text-white py-16 text-center">
    <div class="max-w-4xl mx-auto px-6" data-aos="fade-up">
        <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">
            Bienvenue sur la plateforme <span class="underline decoration-white/60">Infirmerie</span> de l’ISEP de Thiès
            🏥
        </h1>
        <p class="text-lg md:text-xl opacity-90">
            Une solution digitale moderne pour simplifier la gestion de votre santé au quotidien 📋💊
        </p>
    </div>
</section>

{{-- FONCTIONNALITÉS --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-vert mb-12" data-aos="fade-down">
            ⚙️ Fonctionnalités principales
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Carte 1 -->
            <div class="bg-vert-clair p-8 rounded-2xl shadow-lg card-hover" data-aos="zoom-in">
                <div class="text-4xl mb-3">💊</div>
                <h3 class="text-xl font-bold text-vert mb-2">Gestion des Médicaments</h3>
                <p class="text-gray-600">
                    Ajoutez, modifiez ou supprimez vos traitements en toute simplicité, et suivez vos stocks.
                </p>
            </div>

            <!-- Carte 2 -->
            <div class="bg-vert-clair p-8 rounded-2xl shadow-lg card-hover" data-aos="zoom-in" data-aos-delay="100">
                <div class="text-4xl mb-3">⏰</div>
                <h3 class="text-xl font-bold text-vert mb-2">Alertes de Prise</h3>
                <p class="text-gray-600">
                    Recevez des rappels automatiques pour ne jamais rater vos prises de médicaments.
                </p>
            </div>

            <!-- Carte 3 -->
            <div class="bg-vert-clair p-8 rounded-2xl shadow-lg card-hover" data-aos="zoom-in" data-aos-delay="200">
                <div class="text-4xl mb-3">📈</div>
                <h3 class="text-xl font-bold text-vert mb-2">Suivi Thérapeutique</h3>
                <p class="text-gray-600">
                    Consultez votre historique de soins et surveillez votre évolution de santé.
                </p>
            </div>
        </div>

        <!-- Deuxième ligne -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
            <div class="bg-vert-clair p-8 rounded-2xl shadow-lg card-hover" data-aos="zoom-in">
                <div class="text-4xl mb-3">🌿</div>
                <h3 class="text-xl font-bold text-vert mb-2">Bien-être</h3>
                <p class="text-gray-600">
                    Recevez des conseils personnalisés sur le mental, le sommeil et l’alimentation.
                </p>
            </div>

            <div class="bg-vert-clair p-8 rounded-2xl shadow-lg card-hover" data-aos="zoom-in" data-aos-delay="100">
                <div class="text-4xl mb-3">💉</div>
                <h3 class="text-xl font-bold text-vert mb-2">Santé & Soins</h3>
                <p class="text-gray-600">
                    Accédez à des informations pratiques sur les soins, consultations et la prévention à l’infirmerie.
                </p>
            </div>

            <div class="bg-vert-clair p-8 rounded-2xl shadow-lg card-hover" data-aos="zoom-in" data-aos-delay="200">
                <div class="text-4xl mb-3">🩹</div>
                <h3 class="text-xl font-bold text-vert mb-2">Vaccinations</h3>
                <p class="text-gray-600">
                    Suivez vos rappels de vaccination et recevez des conseils pour rester protégé.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- CTA FINALE --}}
<section class="bg-vert text-white py-16 text-center" data-aos="fade-up">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Prêt à gérer votre santé autrement ?</h2>
        <p class="text-lg mb-6 opacity-90">
            Rejoignez la plateforme dès aujourd’hui et profitez d’un accompagnement intelligent et personnalisé.
        </p>
        <a href="{{ route('login') }}"
            class="bg-white text-vert font-semibold px-8 py-3 rounded-lg shadow-lg hover:bg-gray-100 transition">
            🚀 Commencer maintenant
        </a>
    </div>
</section>

<script>
    AOS.init({ duration: 800, once: true });
</script>
@endsection