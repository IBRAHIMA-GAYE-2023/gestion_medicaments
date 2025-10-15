@extends('layouts.app')

@section('content')

<!-- Import Tailwind CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="">
    <!-- Main Content -->
    <main class="p-10">
        <!-- Header tableau de bord -->
        <div class="mb-6"> <h1 class="text-3xl font-bold text-gray-800">🧾 Liste des Médicaments</h1> </div>

        <!-- Bouton Ajouter un médicament -->
        <a href="{{ route('medicaments.create') }}" 
           class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded mb-6 transition duration-300">
            ➕Ajouter un Médicament
        </a>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        
        <!-- Tableau des médicaments -->
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <span class="text-3xl text-gray-500 ">Nombre de Medicaments: {{ $totalMedicaments }} </span>
            <table class="min-w-full divide-y divide-gray-300 border mt-4 border-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border">Heure à Prendre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border">Détails</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($medicaments as $medicament)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900 border">{{ $medicament->nom }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 border">{{ $medicament->stock }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 border">{{ $medicament->heure_a_prendre }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 border">{{ $medicament->details }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 border">
                                <div class="flex gap-x-2">
                                    <a href="{{ route('medicaments.edit', $medicament) }}" 
                                      class="flex items-center gap-1 bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded">
                                        ✏️ <span>Modifier</span>
                                    </a>
                                    <form action="{{ route('medicaments.destroy', $medicament) }}" method="POST"
                                          onsubmit="return confirm('Voulez-vous vraiment supprimer ce médicament ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="flex items-center gap-1 bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded">
                                            🗑️<span>Supprimer</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
