@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Modifica Specie</h2>

    
    <form action="{{ route('species.update', $species) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nome comune --}}
        <div class="mb-3">
            <label for="nome" class="form-label">Nome comune</label>
            <input type="text" name="nome" id="nome" class="form-control" 
                   value="{{ old('nome', $species->nome) }}" required>
        </div>

        {{-- Descrizione --}}
        <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione</label>
            <textarea name="descrizione" id="descrizione" class="form-control" rows="4" required>{{ old('descrizione', $species->descrizione) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Aggiorna</button>
        <a href="{{ route('species.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection
