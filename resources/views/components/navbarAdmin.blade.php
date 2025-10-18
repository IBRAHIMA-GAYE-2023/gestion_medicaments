<!-- Si Alpine.js n’est pas encore inclus : -->
<nav x-data="{ open: false }" class="bg-green-500 p-4 shadow">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div class="text-white font-bold text-lg">
            Gestion Médicament
        </div>

        <!-- Bouton toggle mobile -->
        <button @click="open = !open" class="text-white md:hidden focus:outline-none">
            <!-- Icône hamburger -->
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- Icône X (fermer) -->
            <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Menu desktop -->
        <div class="hidden md:flex space-x-4 items-center">
            <a href="{{ route('dashboardAdmin') }}"
                class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
                Dashboard
            </a>
            <a href="{{ route('admin.messages') }}"
                class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
                Messages
            </a>
            <a href="{{ route('medicaments.index') }}"
                class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
                Médicaments
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Menu mobile -->
    <div x-show="open" x-cloak x-transition
        class="md:hidden mt-2 flex flex-col space-y-2 bg-green-400 rounded p-3">
        <a href="{{ route('dashboardAdmin') }}"
            class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
            Dashboard
        </a>
        <a href="{{ route('admin.messages') }}"
            class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
            Messages
        </a>
        <a href="{{ route('medicaments.index') }}"
            class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
            Médicaments
        </a>
        <form id="logout-form-mobile" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-white hover:bg-green-600 rounded px-3 py-2 transition">
                Logout
            </button>
        </form>
    </div>
</nav>
