<!-- resources/views/medicaments/details.blade.php -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@if(session('success'))
<div class="mb-6 p-4 bg-green-100 text-green-800 rounded border border-green-300">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-6 p-4 bg-red-100 text-red-800 rounded border border-red-300">
    {{ session('error') }}
</div>
@endif

<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50 flex items-center justify-center p-6">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-8 border border-gray-200">
        <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">
            💊 Détails du Médicament
        </h2>

        <div class="space-y-3 mb-6 text-gray-800">
            <p><strong>Nom :</strong> {{ $medicament->nom }}</p>
            <p><strong>Stock disponible :</strong> {{ $medicament->stock }}</p>
            <p><strong>Heure à prendre :</strong> {{ $medicament->heure_a_prendre }}</p>
            <p><strong>Détails :</strong> {{ $medicament->details }}</p>
        </div>

        <!-- Formulaire unique pour prendre le médicament -->
        <form action="{{ route('medicaments.prendre') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="medicament_id" value="{{ $medicament->id }}">

            <div>
                <label for="quantite" class="block text-gray-700 font-medium mb-1">
                    Quantité à prendre :
                </label>
                <input type="number" id="quantite" name="quantite" min="1" max="{{ $medicament->stock }}" value="1"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('user.infirmerie') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded transition">
                    ⬅️ Retour
                </a>

                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded transition">
                    ✅ Confirmer la prise
                </button>
            </div>
        </form>
    </div>
</div>
