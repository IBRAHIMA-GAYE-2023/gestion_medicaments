<nav class="bg-green-500 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white font-bold text-lg">Gestion Medicament</div>
        <div class="space-x-4">
            <a href="{{ route('dashboardAdmin') }}" class="text-white hover:bg-green-600 rounded px-3 py-2">Dashboard</a>
            <a href="{{ route('messages') }}" class="text-white hover:bg-green-600 rounded px-3 py-2">Messages</a>
            <a href="{{ route('medicaments.index') }}" class="text-white hover:bg-green-600 rounded px-3 py-2">Medicaments</a>

            <!-- Logout button -->
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-white hover:bg-green-600 rounded px-3 py-2">Logout</button>
            </form>
        </div>
    </div>
</nav>
