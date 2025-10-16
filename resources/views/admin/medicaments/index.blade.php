@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="min-h-screen bg-gray-100 py-10">
    <main class="max-w-7xl mx-auto px-6">
        
        <!-- HEADER -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-800 flex items-center gap-2">
                    🧾 Liste des Médicaments
                </h1>
                <p class="text-gray-500 text-sm mt-1">
                    Gérez le stock et les informations de vos médicaments en un clin d’œil.
                </p>
            </div>

            <a href="{{ route('medicaments.create') }}" 
               class="mt-4 sm:mt-0 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-5 rounded-lg shadow transition-all duration-300 flex items-center gap-2">
                ➕ Ajouter un Médicament
            </a>
        </div>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="mb-6 flex items-center gap-3 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-sm">
                <span class="text-green-600 text-xl">✅</span>
                <p class="text-green-700 font-medium">{{ session('success') }}</p>
            </div>
        @endif

        <!-- STAT -->
        <div class="bg-white rounded-xl shadow p-5 flex items-center justify-between mb-6 border border-gray-100">
            <span class="text-lg font-semibold text-gray-700">
                Nombre total de médicaments :
            </span>
            <span class="text-3xl font-extrabold text-green-600">
                {{ $totalMedicaments }}
            </span>
        </div>

        <!-- TABLEAU -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Heure à prendre</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Détails</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($medicaments as $medicament)
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $medicament->nom }}</td>
                            
                            <td class="px-6 py-4 text-sm">
                                @if($medicament->stock > 10)
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $medicament->stock }}
                                    </span>
                                @elseif($medicament->stock > 0)
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $medicament->stock }}
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Rupture
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-700">{{ $medicament->heure_a_prendre }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $medicament->details }}</td>

                            <td class="px-6 py-4 text-sm text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('medicaments.edit', $medicament) }}" 
                                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 transition">
                                        ✏️ Modifier
                                    </a>
                                    <form action="{{ route('medicaments.destroy', $medicament) }}" method="POST"
                                          onsubmit="return confirm('Voulez-vous vraiment supprimer ce médicament ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 transition">
                                            🗑️ Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-gray-500 text-sm">
                                Aucun médicament enregistré pour le moment 💊
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
