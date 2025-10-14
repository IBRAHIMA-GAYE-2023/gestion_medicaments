@extends('layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>

<!-- Tailwind Formulaire d'inscription -->
<div class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-center text-green-600 mb-6">Créer un compte</h2>

        <!-- Affichage des erreurs -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            
            <!-- Nom -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="mt-1 py-1 px-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"placeholder="votre nom">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="mt-1 py-1 px-2  block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" placeholder="votre email">
            </div>

            <!-- Mot de passe -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="password" required
                    class="mt-1 py-1 px-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" placeholder="votre mot de passe">
            </div>

            <!-- Confirmation -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Confirmer mot de passe</label>
                <input type="password" name="password_confirmation" required
                    class="mt-1 py-1 px-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" placeholder="confirmez">
            </div>

            <!-- Rôle -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Rôle</label>
                <select name="role" required
                    class="mt-1 py-1 px-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" placeholder="role">
                    <option value="user">Apprenant(e)</option>
                    <option value="admin">Administrateur</option>
                    
                </select>
            </div>

            <!-- Bouton -->
            <div>
                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                    S’inscrire
                </button>
            </div>

            <!-- Lien Connexion -->
            <p class="text-center text-sm text-gray-600">
                Déjà inscrit ?
                <a href="{{ route('login') }}" class="text-green-600 hover:underline">Connexion</a>
            </p>
        </form>
    </div>
</div>
@endsection
