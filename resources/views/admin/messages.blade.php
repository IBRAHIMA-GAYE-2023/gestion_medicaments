<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    @include('components.navbarAdmin')

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">📨 Messages reçus</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($messages as $message)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6">
                    <div class="mb-2">
                        <p class="text-sm text-gray-500">👤 <strong>Expéditeur :</strong> {{ $message->sender->name ?? 'Inconnu' }}</p>
                        <p class="text-sm text-gray-500">💊 <strong>Médicament :</strong> {{ $message->typeMedicament }}</p>
                    </div>

                    <div class="border-t border-gray-200 my-3"></div>

                    <p class="text-gray-700 mb-4">
                        <strong>Message :</strong><br>
                        {{ $message->content }}
                    </p>
                    <form action="#" method="POST" class="space-y-2">
                        @csrf
                        <textarea
                            name="reply"
                            rows="2"
                            class="w-full p-2 border rounded-md focus:ring focus:ring-blue-200 text-sm"
                            placeholder="Écrire une réponse..."></textarea>
                             <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded-md hover:bg-black transition">
                            Répondre
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
