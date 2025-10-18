@extends('layouts.app')
@section('content')

<!-- HEADER -->
<header class="text-center mt-12 mb-8 px-6">
    <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">🩺 Tableau de Bord Infirmier</h1>
    <p class="text-gray-500 mt-3 text-lg max-w-2xl mx-auto">
        Suivez la santé des apprenants, les stocks de médicaments et les signalements en temps réel.
    </p>
</header>

<!-- ACTIONS RAPIDES -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 px-6">
    <button class="bg-yellow-400 text-white px-6 py-2.5 rounded-xl shadow hover:shadow-md hover:bg-yellow-500 transition flex items-center gap-2">
        ➕ Vous avez {{$totalMessages ?? 0}} nouveaux messages
    </button>
    <a href="{{ route('medicaments.create') }}" class="bg-indigo-600 text-white px-6 py-2.5 rounded-xl shadow hover:shadow-md hover:bg-indigo-700 transition flex items-center gap-2">
        ➕ Ajouter Médicament
    </a>
    <button class="bg-green-600 text-white px-6 py-2.5 rounded-xl shadow hover:shadow-md hover:bg-green-700 transition flex items-center gap-2">
        🔍 Rechercher Apprenant
    </button>
    <button class="bg-red-600 text-white px-6 py-2.5 rounded-xl shadow hover:shadow-md hover:bg-red-700 transition flex items-center gap-2">
        🚨 Signaler Malade
    </button>
</div>

<!-- SECTION CHART + ACTIVITÉS -->
<section class="container mx-auto mt-16 px-6 grid grid-cols-1 lg:grid-cols-2 gap-8">

    <!-- 📊 CHART -->
    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 flex flex-col justify-center">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">📈 Statistiques Générales</h3>
        <canvas id="healthChart" class="max-h-80"></canvas>
    </div>

    <!-- 🕓 ACTIVITÉS RÉCENTES -->
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-800">🕓 Activités Récentes</h3>
            <button class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Voir tout</button>
        </div>

        <ul class="space-y-5 text-gray-600">
            <li class="flex items-start gap-3 border-l-4 border-green-500 pl-3">
                <span class="text-green-500 text-xl">💊</span>
                <span>Médicament <strong>Paracétamol</strong> ajouté au stock.</span>
            </li>
            <li class="flex items-start gap-3 border-l-4 border-blue-500 pl-3">
                <span class="text-blue-500 text-xl">👩‍⚕️</span>
                <span>Apprenant <strong>Aïssatou</strong> a pris un traitement.</span>
            </li>
            <li class="flex items-start gap-3 border-l-4 border-red-500 pl-3">
                <span class="text-red-500 text-xl">🚨</span>
                <span>Signalement : <strong>Ousmane</strong> déclaré malade.</span>
            </li>
            <li class="flex items-start gap-3 border-l-4 border-yellow-500 pl-3">
                <span class="text-yellow-500 text-xl">📦</span>
                <span>Stock du médicament <strong>Amoxicilline</strong> presque épuisé.</span>
            </li>
        </ul>
    </div>
</section>

<!-- INDICATEURS CLÉS -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16 px-6 max-w-6xl mx-auto mb-20">
    <div class="p-6 bg-green-50 border-l-4 border-green-500 rounded-xl shadow-sm hover:shadow-md transition">
        <h4 class="text-sm text-gray-700 font-semibold">Taux de guérison</h4>
        <p class="text-3xl font-bold text-green-600 mt-2">92%</p>
    </div>
    <div class="p-6 bg-yellow-50 border-l-4 border-yellow-500 rounded-xl shadow-sm hover:shadow-md transition">
        <h4 class="text-sm text-gray-700 font-semibold">Stock critique</h4>
        <p class="text-3xl font-bold text-yellow-600 mt-2">3 médicaments</p>
    </div>
    <div class="p-6 bg-blue-50 border-l-4 border-blue-500 rounded-xl shadow-sm hover:shadow-md transition">
        <h4 class="text-sm text-gray-700 font-semibold">Soins hebdomadaires</h4>
        <p class="text-3xl font-bold text-blue-600 mt-2">22</p>
    </div>
</section>

<!-- CHART.JS SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('healthChart');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Médicaments pris', 'Totaux', 'Apprenants malades'],
            datasets: [{
                data: [
                    {{ $totalMedicamentsPris ?? 0 }},
                    {{ ($totalMedicaments ?? 0) - ($totalMedicamentsPris ?? 0) }},
                    {{ $totalApprenantsMalades ?? 0 }}
                ],
                backgroundColor: ['#10B981', '#3B82F6', '#EF4444'],
                borderWidth: 2,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { usePointStyle: true, boxWidth: 12, font: { size: 14 } }
                }
            },
            animation: {
                animateRotate: true,
                animateScale: true,
                duration: 1800,
                easing: 'easeOutQuint'
            }
        }
    });
</script>

@endsection
