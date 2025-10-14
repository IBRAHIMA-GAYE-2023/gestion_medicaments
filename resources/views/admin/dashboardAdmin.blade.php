<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@include('components.navbarAdmin')
<div class="text-center mt-6">
    <h1 class="text-3xl font-bold">Dashboard administratif</h1>
    <p class="text-gray-600 mt-2">Visualisez les statistiques de santé, la gestion des médicaments et l'état des apprenants en temps réel.</p>
</div>

<div class="container mx-auto mt-10 flex justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-center">
        
        <!-- Carte 1 - Total Médicaments -->
        <div class="bg-gray p-6 rounded shadow-md w-64">
            <h1 class="text-lg font-bold">Nombre total de médicaments</h1>
            <p class="text-2xl mt-2">{{ $totalMedicaments ?? '0' }}</p>
        </div>

        <!-- Carte 2 - Médicaments Restants -->
        <div class="bg-gray p-6 rounded shadow-md w-64">
            <h1 class="text-lg font-bold">Nombre de médicaments restants</h1>
            <p class="text-2xl mt-2">{{ $totalMedicamentsRestants ?? '0' }}</p>
        </div>

        <!-- Carte 3 - Médicaments Pris -->
        <div class="bg-gray p-6 rounded shadow-md w-64">
            <h1 class="text-lg font-bold">Nombre médicaments pris</h1>
            <p class="text-2xl mt-2">{{ $totalMedicamentsPris ?? '0' }}</p>
        </div>

        <!-- Carte 4 - Apprenants Malades -->
        <div class="bg-gray p-6 rounded shadow-md w-64">
            <h1 class="text-lg font-bold">Nombre d’apprenants malades</h1>
            <p class="text-2xl mt-2">{{ $totalApprenantsMalades ?? '0' }}</p>
        </div>

    </div>
</div>



