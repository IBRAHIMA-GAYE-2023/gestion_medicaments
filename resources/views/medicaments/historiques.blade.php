<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="min-h-screen bg-green-50 p-6">
    <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-lg p-6 border border-gray-200">
        <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">
            📋 Historique de mes médicaments pris
        </h2>

        @if($prises->isEmpty())
        <p class="text-gray-500 text-center">Aucun médicament pris pour le moment.</p>
        @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 text-sm">
                <thead class="bg-green-600 text-white uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3 text-left border">Nom du médicament</th>
                        <th class="px-6 py-3 text-left border">Quantité</th>
                        <th class="px-6 py-3 text-left border">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($prises as $prise)
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-6 py-4 border">{{ $prise->medicament->nom }}</td>
                        <td class="px-6 py-4 border">{{ $prise->quantite_pris }}</td>
                        <td class="px-6 py-4 border">{{ $prise->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <div class="mt-6 text-center">
            <a href="{{ route('user.infirmerie') }}"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded transition">
                ⬅️ Retour
            </a>
        </div>
    </div>
</div>