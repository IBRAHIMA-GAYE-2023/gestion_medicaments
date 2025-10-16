<nav class="bg-green-500 p-4">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <!-- Logo -->
        <div class="text-white font-bold text-lg mb-2 md:mb-0">
            Gestion Médicament
        </div>

        <!-- Menu -->
        <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4 items-center">
            <a href="{{ route('dashboardAdmin') }}" class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
                Dashboard
            </a>
            <a href="{{ route('admin.messages') }}" class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
                Messages
            </a>
            <a href="{{ route('medicaments.index') }}"
                class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
                Médicaments
            </a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
                Logout
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</nav>