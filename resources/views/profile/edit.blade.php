<!-- resources/views/profile/edit.blade.php -->

<!-- Tailwind CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="min-h-screen bg-gray-100 py-12 px-6">
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">🔒 Modifier mon mot de passe</h2>

        @if (session('status'))
            <div class="mb-4 text-green-600 font-medium">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update.password') }}">
            @csrf
            @method('PUT')

            <!-- Mot de passe actuel -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Mot de passe actuel</label>
                <input type="password" name="current_password"
                       class="mt-1 w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                @error('current_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nouveau mot de passe -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                <input type="password" name="password"
                       class="mt-1 w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmer mot de passe -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation"
                       class="mt-1 w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="text-center">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded transition">
                    💾Mettre à jour le mot de passe
                </button>
            </div>
        </form>
    </div>
</div>
