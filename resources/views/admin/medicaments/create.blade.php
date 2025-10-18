@extends('layouts.app')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 via-white to-blue-50 p-6">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8 border border-gray-200">
        <h1 class="text-2xl font-bold text-green-700 mb-6 text-center">Ajouter un Médicament</h1>

        <form action="{{ route('medicaments.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nom" class="block text-gray-700 font-medium mb-1">Nom du Médicament</label>
                <input type="text" name="nom" id="nom"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    required>
            </div>

            <div>
                <label for="stock" class="block text-gray-700 font-medium mb-1">Nombre de Stock</label>
                <input type="number" name="stock" id="stock"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    required>
            </div>

            <div>
                <label for="heure_a_prendre" class="block text-gray-700 font-medium mb-1">Heure à Prendre</label>
                <input type="time" name="heure_a_prendre" id="heure_a_prendre"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    required>
            </div>

            <div>
                <label for="details" class="block text-gray-700 font-medium mb-1">Détails</label>
                <textarea name="details" id="details"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
            </div>

            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg transition duration-200">Ajouter</button>
        </form>
    </div>
</div>
@endsection