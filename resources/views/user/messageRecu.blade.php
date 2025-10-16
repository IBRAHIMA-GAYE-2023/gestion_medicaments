@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="max-w-6xl mx-auto px-4 py-10">

    <h1 class="text-4xl font-bold text-gray-800 mb-8">📨 Mes Messages</h1>

    @if($messages->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($messages as $message)
        <div class="bg-white rounded-2xl shadow p-6 border border-gray-100">
            <p class="text-sm text-gray-600">💬 Message envoyé : {{ $message->content }}</p>
            <p class="text-xs text-gray-400 mb-2">📅 {{ $message->created_at->format('d M Y à H:i') }}</p>

            @if($message->reply)
            <div class="p-3 bg-green-50 border-l-4 border-green-500 rounded">
                <p class="text-gray-700">🩺 Réponse : {{ $message->reply }}</p>
                <p class="text-xs text-gray-400 mt-1">{{ $message->updated_at->format('d M Y à H:i') }}</p>
            </div>
            @else
            <p class="mt-2 text-gray-400">⌛ En attente de réponse...</p>
            @endif
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center mt-20">
        <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" class="w-40 h-40 mx-auto opacity-80">
        <h2 class="text-2xl font-semibold mt-4">Aucun message reçu 📭</h2>
    </div>
    @endif

</div>
@endsection