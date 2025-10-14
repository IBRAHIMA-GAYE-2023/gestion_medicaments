    <nav class="navbar navbar-expand-lg bg-green-600 mb-4 ">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-capsule"></i> Gestion Médicaments
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                @if(Auth::check())
                                    {{Auth::user()->name}}
                                @else
                                    Bonjour visiteur
                                @endif                                  
                            </a>

                                <!-- <a class="navbar-brand" href="{{ url('infirmerie') }}">
                                    <i class="bi bi-capsule"></i> Infirmerie
                                </a> -->
                                <ul class="dropdown-menu dropdown-menu-end">
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item">🚪Déconnexion</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                </ul>
            </div>
        </div>
    </nav>