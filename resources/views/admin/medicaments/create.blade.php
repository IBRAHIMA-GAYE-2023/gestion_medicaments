@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Médicament</h1>
    <form action="{{ route('medicaments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom du Médicament</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stock">Nombre de Stock</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="heure_a_prendre">Heure à Prendre</label>
            <input type="time" name="heure_a_prendre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="details">Détails</label>
            <textarea name="details" class="form-control"></textarea>
        </div>
        <button type="submit" class="mt-3 btn btn-dark">Ajouter</button>
    </form>
</div>
@endsection