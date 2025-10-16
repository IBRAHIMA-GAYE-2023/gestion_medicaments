<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Envoyer un message à l'infirmier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ✅ CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center py-10">

    <div class="w-full max-w-2xl bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Envoyer un message à l'infirmier</h2>

        <!-- Message de succès -->
        @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
        @endif

        <!-- Erreurs de validation -->
        @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Formulaire -->
        <form action="{{ route('messages.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="typeMedicament" class="block text-sm font-medium text-gray-700">Type de Maladie</label>
                <input type="text" name="typeMedicament" id="typeMedicament" required
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2">
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Symptômes</label>
                <textarea name="content" id="content" rows="4" required
                    class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2"></textarea>
            </div>

            <div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition duration-200">
                    Envoyer
                </button>
            </div>
        </form>
    </div>

</body>

</html>