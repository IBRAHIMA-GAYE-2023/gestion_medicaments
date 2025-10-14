<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médicaments - @yield('title', 'Gestion')</title>
        <style>
        .animated-card {
            transition: transform 0.4s ease; /* Durée et type de transition */
        }

        .animated-card:hover {
            transform: translateY(-10px); /* Translation vers le haut lors du survol */
        }
    </style> 
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optionnel : icônes Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <!-- Navbar -->   
    @if(Auth::check() && Auth::user()->role === "admin")
        @include('components.navbarAdmin')
    @endif

    @if(Auth::check() && Auth::user()->role === "user")
        @include('components.navbarUser')
    @endif

    <!-- Contenu principal -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     
</body>
</html>
