<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @include('components.navbarAdmin')

    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold mb-4">Messages</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($messages as $message)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="font-semibold text-lg">Message ID: {{ $message->id }}</h2>
                    <p class="text-gray-700 mt-2">{{ $message->content }}</p>
                    <p class="text-sm text-gray-500 mt-2">Envoyé par: {{ $message->sender_id }}</p>
                    <p class="text-sm text-gray-500">Destinataire: {{ $message->receiver_id }}</p>
                    <p class="text-sm text-gray-500">Lu: {{ $message->is_read ? 'Oui' : 'Non' }}</p>
                    <p class="text-sm text-gray-500">Type de Médicament: {{ $message->typeMedicament }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>