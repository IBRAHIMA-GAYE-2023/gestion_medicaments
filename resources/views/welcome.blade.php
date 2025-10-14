@extends('layouts.app')

@section('content')
<style>
    .bg-vert {
        background-color: #2ECC71;
    }

    .bg-vert-clair {
        background-color: #E9F7EF;
    }

    .text-vert {
        color: #2ECC71;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        transition: 0.3s;
    }
</style>

{{-- HEADER --}}
<div class="container-fluid bg-vert text-white py-4">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Bienvenue sur la plateforme Infirmerie de l’ISEP de Thiès</h1>
        <p class="lead">Une solution digitale pour la gestion de votre santé au quotidien📋💊</p>
        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-light btn-lg me-3">Se connecter</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">S’inscrire</a>
        </div>
    </div>
</div>

{{-- FONCTIONNALITÉS --}}
<div class="container py-4">
    <h2 class="text-center mb-3 fw-bold text-vert">🛠️Fonctionnalités principales</h2>
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card bg-vert-clair shadow-lg border-0 card-hover">
                <div class="card-body">
                    <h5 class="card-title text-vert">💊 Gestion des Médicaments</h5>
                    <p class="card-text">Ajoutez, mettez à jour ou supprimez vos traitements facilement.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4 mt-md-0">
            <div class="card bg-vert-clair shadow-lg border-0 card-hover">
                <div class="card-body">
                    <h5 class="card-title text-vert">⏰ Alertes de Prise</h5>
                    <p class="card-text">Recevez des rappels pour ne jamais rater vos prises.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4 mt-md-0">
            <div class="card bg-vert-clair shadow-lg border-0 card-hover">
                <div class="card-body">
                    <h5 class="card-title text-vert">📈 Suivi Thérapeutique</h5>
                    <p class="card-text">Consultez l’historique de vos traitements et améliorez votre santé.</p>
                </div>
            </div>
        </div>
    </div>

     <div class="row text-center mt-2">
        <div class="col-md-4">
            <div class="card bg-vert-clair shadow-lg border-0 card-hover">
                <div class="card-body">
                    <h5 class="card-title text-vert">💊Bien-etre</h5>
                    <p class="card-text">Conseils sur la santé mentale, l'alimentaion et le sommeil.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4 mt-md-0">
            <div class="card bg-vert-clair shadow-lg border-0 card-hover">
                <div class="card-body">
                    <h5 class="card-title text-vert">⏰ santé</h5>
                    <p class="card-text">Soins, consultations et prévention à l'infirmerie.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4 mt-md-0">
            <div class="card bg-vert-clair shadow-lg border-0 card-hover">
                <div class="card-body">
                    <h5 class="card-title text-vert">📈 Vaccinations</h5>
                    <p class="card-text">Suivi des vaccinations et conseils pour rester protégé.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
