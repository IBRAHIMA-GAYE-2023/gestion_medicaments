@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="">

    <!-- Main content -->
    <main class="flex-1 p-10">
        <div class="bg-white rounded-2xl shadow-lg p-10 border border-green-100">

            <!-- Salutation -->
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-extrabold text-green-700 mb-3">👋 Bonjour {{ auth()->user()->name
                    }}</h1>
                <p class="text-gray-600 text-lg md:text-xl">
                    Bienvenue dans votre espace personnel. Gérez votre profil et accédez aux services de l'infirmerie.
                </p>
            </div>

            <!-- STAT CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <a href="{{route('medicaments.historique')}}"
                    class="bg-green-50 border-l-4 border-green-500 p-6 rounded-xl shadow hover:shadow-md transition transform hover:-translate-y-1">
                    <h3 class="text-gray-700 font-semibold mb-2">💊 Médicaments Pris</h3>
                </a>

                <div
                    class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-xl shadow hover:shadow-md transition transform hover:-translate-y-1">
                    <h3 class="text-gray-700 font-semibold mb-2">💊 Médicaments Restants</h3>
                    <p class="text-3xl font-bold text-blue-700">{{ $medicamentsRestants ?? 0 }}</p>
                </div>

                <div
                    class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-xl shadow hover:shadow-md transition transform hover:-translate-y-1">
                    <h3 class="text-gray-700 font-semibold mb-2">⏰ Prochain Rappel</h3>
                    <p class="text-2xl font-bold text-yellow-600">{{ $prochainRappel ?? 'Aucun' }}</p>
                </div>

                <div
                    class="bg-red-50 border-l-4 border-red-500 p-6 rounded-xl shadow hover:shadow-md transition transform hover:-translate-y-1">
                    <h3 class="text-gray-700 font-semibold mb-2">🚨 Signalements Maladie</h3>
                    <p class="text-3xl font-bold text-red-600">{{ $signalementsMaladie ?? 0 }}</p>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <a href="{{ route('formMessage') }}"
                    class="bg-green-50 hover:bg-green-100 border border-green-200 rounded-xl p-6 text-center shadow-md transition transform hover:-translate-y-1 hover:scale-105">
                    ✉️ <p class="mt-2 font-medium text-green-700">Envoyer un message</p>
                </a>
                <a href="{{ route('messagesRecu') }}"
                    class="bg-green-50 hover:bg-green-100 border border-green-200 rounded-xl p-6 text-center shadow-md transition transform hover:-translate-y-1 hover:scale-105">
                    ✉️ <p class="mt-2 font-medium text-green-700">Message Reçus</p>
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="bg-green-50 hover:bg-green-100 border border-green-200 rounded-xl p-6 text-center shadow-md transition transform hover:-translate-y-1 hover:scale-105">
                    🛠️ <p class="mt-2 font-medium text-green-700">Mettre à jour le profil</p>
                </a>
                <a href="{{ route('user.infirmerie') }}"
                    class="bg-green-50 hover:bg-green-100 border border-green-200 rounded-xl p-6 text-center shadow-md transition transform hover:-translate-y-1 hover:scale-105">
                    🩺 <p class="mt-2 font-medium text-green-700">Accéder à l’infirmerie</p>
                </a>
            </div>

        </div>
    </main>
</div>
@endsection