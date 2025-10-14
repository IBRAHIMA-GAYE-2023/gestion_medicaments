<!-- Import Tailwind CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50 py-12 px-6">
    <div class="max-w-7xl mx-auto bg-white  rounded-lg p-8 border border-gray-200">
        
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="flex justify-center items-center space-x-3 mb-4">
                <svg class="w-10 h-10 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v16l4-4h12c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                </svg>
                <h1 class="text-4xl font-extrabold text-gray-800">Infirmerie - ISEP Abdoulaye Ly Thiès</h1>
            </div>
            <p class="text-gray-600 text-lg">Consultez les médicaments disponibles et gérez vos besoins médicaux en toute simplicité.</p>
        </div>

        <!-- Barre de recherche + Bouton retour -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <!-- Bouton retour -->
            <a href="/dashboard" 
            class="mb-4 md:mb-0 inline-block bg-green-700 hover:bg-gray-700 text-white font-medium px-5 py-2 rounded shadow transition duration-300">
                ⬅️ Retour
            </a>
        
            <!-- Barre de recherche -->
            <form method="GET" action="{{ route('user.infirmerie') }}" class="w-full md:w-1/2">
                <input type="text" name="search" placeholder="🔍 Rechercher un médicament..."
                       class="w-full px-5 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
            </form>
        </div>

        <!-- Tableau des médicaments -->
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white border border-gray-300 text-sm">
                <thead class="bg-green-600 text-white uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3 text-left border">Nom</th>
                        <th class="px-6 py-3 text-left border">Stock</th>
                        <th class="px-6 py-3 text-left border">Heure à Prendre</th>
                        <th class="px-6 py-3 text-left border">Détails</th>
                        <th class="px-6 py-3 text-left border">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($medicaments as $medicament)
                        <tr class="hover:bg-green-50 transition">
                            <td class="px-6 py-4 border text-gray-800">{{ $medicament->nom }}</td>
                            <td class="px-6 py-4 border text-gray-800">{{ $medicament->stock }}</td>
                            <td class="px-6 py-4 border text-gray-800">{{ $medicament->heure_a_prendre }}</td>
                            <td class="px-6 py-4 border text-gray-800">{{ $medicament->details }}</td>
                             <!-- <td class="px-6 py-4 border">
                                <a href="{{ route('medicaments.show', $medicament) }}" 
                                   class="inline-flex items-center text-green-700 hover:text-green-900 font-semibold transition">
                                        <span class="ml-1">Prise-Med</span>
                                </a>
                            </td> -->
                            <td class="px-6 py-4 border">
                                <a href="{{ route('medicaments.show', $medicament) }}" 
                                   class="inline-flex items-center text-green-700 hover:text-green-900 font-semibold transition">
                                    👁️<span class="ml-1">Voir</span>
                                </a>
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500">Aucun médicament trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
