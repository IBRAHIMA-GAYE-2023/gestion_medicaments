@extends('layouts.app')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
<div class="container">
    <h1>Modifier un Médicament</h1>
   <form action="{{ route('medicaments.update', $medicament) }}" method="POST">
    @csrf
    @method('PUT') <!-- Assurez-vous que cette ligne est présente -->
    <div class="form-group">
        <label for="nom">Nom du Médicament</label>
        <input type="text" name="nom" class="form-control" value="{{ $medicament->nom }}" required>
    </div>
    <div class="form-group">
        <label for="stock">Nombre de Stock</label>
        <input type="number" name="stock" class="form-control" value="{{ $medicament->stock }}" required>
    </div>
    <div class="form-group">
        <label for="heure_a_prendre">Heure à Prendre</label>
        <input type="time" name="heure_a_prendre" class="form-control" value="{{ $medicament->heure_a_prendre }}" required>    </div>
    <div class="form-group">
        <label for="details">Détails</label>
        <textarea name="details" class="form-control">{{ $medicament->details }}</textarea>
    </div>
    <button type="submit" class="mt-3 btn btn-dark">Mettre à Jour</button>
</form>
</div>
@endsection