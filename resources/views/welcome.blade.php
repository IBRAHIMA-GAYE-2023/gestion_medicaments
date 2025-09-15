@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Bannière -->
    <div class="bg-primary text-white text-center py-5" style="background: linear-gradient(rgba(0, 123, 255, 0.7), rgba(0, 123, 255, 0.7)), url('https://img.freepik.com/free-photo/modern-hospital-building_1127-3527.jpg') no-repeat center center/cover; min-height: 60vh;">
        <div class="d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-3 fw-bold">Bienvenue à l’Hôpital Virtuel</h1>
            <p class="lead">Une solution moderne pour la gestion de vos médicaments 💊</p>
            <div class="mt-4">
                <a href="{{ route('login') }}" class="btn btn-light btn-lg me-3">Se connecter</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">S’inscrire</a>
            </div>
        </div>
    </div>

    <!-- Section infos -->
    <div class="container py-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h5 class="card-title text-primary">💊 Gestion des médicaments</h5>
                        <p class="card-text">Ajoutez, modifiez et suivez vos traitements en toute simplicité.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-4 mt-md-0">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h5 class="card-title text-success">⏰ Alertes & rappels</h5>
                        <p class="card-text">Ne ratez plus jamais une prise grâce à nos notifications intelligentes.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-4 mt-md-0">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">👨‍⚕️ Suivi médical</h5>
                        <p class="card-text">Un accompagnement pensé pour améliorer l’observance thérapeutique.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
