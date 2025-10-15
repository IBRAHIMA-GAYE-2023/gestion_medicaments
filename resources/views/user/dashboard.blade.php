@extends('layouts.app')

@section('content')
<!-- Tailwind CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="min-h-screen flex bg-gradient-to-br from-green-100 via-white to-green-50">

    <!-- Sidebar -->
    <aside class="w-64 bg-green-200 text-green-900 shadow-lg flex flex-col py-8 px-4">
        <div class="mb-10 text-center">
            <div class="text-5xl mb-2">🩺</div>
            <h2 class="text-xl font-bold">Espace Apprenant</h2>
        </div>

        <nav class="flex flex-col space-y-4">
            <a href="{{ route('profile.edit') }}"
               class="flex items-center px-4 py-2 hover:bg-green-300 rounded-lg transition duration-200">
                🛠️<span class="ml-3 font-medium">Modifier le profil</span>
            </a>

            <a href="{{ route('user.infirmerie') }}"
               class="flex items-center px-4 py-2 hover:bg-green-300 rounded-lg transition duration-200">
                🏥<span class="ml-3 font-medium">Infirmerie</span>
            </a>

            <a href="{{ route('formMessage') }}"
               class="flex items-center px-4 py-2 hover:bg-green-300 rounded-lg transition duration-200">
                🏥<span class="ml-3 font-medium">Envoyer Message</span>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="pt-6 border-t border-green-300">
                @csrf
                <button type="submit"
                        class="w-full flex items-center px-4 py-2 text-red-600 hover:bg-red-100 rounded-lg transition duration-200">
                    🚪<span class="ml-3 font-medium">Se déconnecter</span>
                </button>
            </form>


        </nav>
    </aside>

    <!-- Main content area -->
    <main class="flex-1 p-10">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-10 border border-green-100">

            <h1 class="text-4xl font-extrabold text-center text-green-700 mb-8">👤 Tableau de Bord</h1>

            <p class="text-gray-600 text-center mb-10">Bienvenue dans votre espace personnel. Ici, vous pouvez gérer votre mot de passe et accéder à l'infirmerie de l'ISEP.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Modifier le profil -->
                <a href="{{ route('profile.edit') }}"
                   class="bg-green-100 hover:bg-green-200 border border-green-300 text-green-800 rounded-lg p-6 flex flex-col items-center shadow transition duration-300">
                    <div class="text-5xl mb-3">🔐</div>
                    <span class="text-lg font-semibold">Modifier le profile</span>
                </a>

                <!-- Accès infirmerie -->
                <a href="{{ route('user.infirmerie') }}"
                   class="bg-green-100 hover:bg-green-200 border border-green-300 text-green-800 rounded-lg p-6 flex flex-col items-center shadow transition duration-300">
                    <div class="text-5xl mb-3"> ➕</div>
                    <span class="text-lg font-semibold">Voir Infirmerie</span>
                </a>

            </div>

            
        </div>
    </main>
</div>
@endsection
