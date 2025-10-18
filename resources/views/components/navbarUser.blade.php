<nav x-data="{ open: false, drop: false }" class="bg-green-200 mb-4 shadow">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <a href="{{ url('/dashboard') }}" class="flex items-center text-green-900 font-semibold">
                Gestion Médicaments
            </a>

            <!-- Mobile hamburger -->
            <button @click="open = !open" aria-label="Toggle menu"
                class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-green-900 hover:bg-green-300 focus:outline-none">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Desktop menu -->
            <div class="hidden md:flex items-center space-x-4">
                <div class="relative" x-data="{ drop: false }">
                    <button @click="drop = !drop" @keydown.escape="drop = false"
                        class="flex items-center gap-2 px-3 py-2 rounded hover:bg-green-300 focus:outline-none">
                        @if(Auth::check())
                        {{ Auth::user()->name }}
                        @else
                        Bonjour visiteur
                        @endif
                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="drop" x-cloak @click.outside="drop = false"
                        class="absolute right-0 mt-2 w-48 bg-white rounded shadow-md border">
                        <ul class="py-1">
                            <li>
                                <hr class="border-t">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                        🚪 Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- Mobile menu content -->
        <div x-show="open" x-cloak class="md:hidden mt-2">
            <div class="bg-white rounded shadow-sm p-3">
                <div class="mb-2">
                    @if(Auth::check())
                    <div class="font-medium text-green-900">{{ Auth::user()->name }}</div>
                    @else
                    <div class="font-medium text-green-900">Bonjour visiteur</div>
                    @endif
                </div>
                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded hover:bg-gray-100">🚪
                            Déconnexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>