@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">💊 Mes Médicaments</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('medicaments.create') }}" class="btn btn-primary mb-3">➕ Ajouter un Médicament</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Dosage</th>
                <th>Fréquence</th>
                <th>Durée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicaments as $med)
                <tr>
                    <td>{{ $med->nom }}</td>
                    <td>{{ $med->dosage }}</td>
                    <td>{{ $med->frequence }}</td>
                    <td>{{ $med->duree ?? '-' }}</td>
                    <td>
                        <a href="{{ route('medicaments.edit', $med->id) }}" class="btn btn-sm btn-warning">✏️ Éditer</a>
                        <form action="{{ route('medicaments.destroy', $med->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">🗑️ Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
