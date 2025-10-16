@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-4xl font-bold text-gray-800 mb-8">📨 Messages Reçus</h1>

    @if($messages->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($messages as $message)
        <div class="bg-white rounded-2xl shadow p-6 border border-gray-100">
            <p class="text-sm text-gray-600">👤 {{ $message->sender->name ?? 'Inconnu' }}</p>
            <p class="text-sm text-gray-600">💊 {{ $message->typeMedicament }}</p>
            <p class="text-xs text-gray-400 mb-2">📅 {{ $message->created_at->format('d M Y à H:i') }}</p>

            <p class="text-gray-700 mb-4">{{ $message->content }}</p>

            <form action="{{ route('messages.repondre', $message) }}" method="POST">
                @csrf
                <textarea name="reply" class="w-full p-2 border rounded mb-2"
                    placeholder="Écrire une réponse...">{{ $message->reply }}</textarea>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Répondre
                </button>
            </form>
            <form action="{{ route('messages.destroy', $message) }}" method="POST"
                onsubmit="return confirm('Voulez-vous vraiment supprimer ce message ?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="mt-2 w-full border border-red-500 text-red-500 px-4 py-2 rounded-lg hover:bg-red-700 hover:text-white transition">
                    Supprimer
                </button>
            </form>

        </div>

        @endforeach
    </div>
    @else
    <p class="text-gray-500">Aucun message pour le moment.</p>
    @endif
</div>
@endsection