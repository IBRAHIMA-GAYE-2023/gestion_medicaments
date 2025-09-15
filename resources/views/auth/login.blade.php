@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px;">
    <h2>Connexion</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
        <p class="mt-2">Pas encore inscrit ? <a href="{{ route('register') }}">Inscription</a></p>
    </form>
</div>
@endsection
