@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">✏️ Modifier le Médicament</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medicaments.update', $medicament->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du médicament</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $medicament->nom) }}" required>
        </div>

        <div class="mb-3">
            <label for="dosage" class="form-label">Dosage</label>
            <input type="text" name="dosage" id="dosage" class="form-control" value="{{ old('dosage', $medicament->dosage) }}" required>
        </div>

        <div class="mb-3">
            <label for="frequence" class="form-label">Fréquence</label>
            <input type="text" name="frequence" id="frequence" class="form-control" value="{{ old('frequence', $medicament->frequence) }}" required>
        </div>

        <div class="mb-3">
            <label for="duree" class="form-label">Durée</label>
            <input type="text" name="duree" id="duree" class="form-control" value="{{ old('duree', $medicament->duree) }}">
        </div>

        <button type="submit" class="btn btn-success">💾 Mettre à jour</button>
        <a href="{{ route('medicaments.index') }}" class="btn btn-secondary">↩️ Annuler</a>
    </form>
</div>
@endsection
