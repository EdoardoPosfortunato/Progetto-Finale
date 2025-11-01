@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Modifica Specie</h2>

    
    <form action="{{ route('tipology.update', $tipologies) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nome comune --}}
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" 
                   value="{{ old('nome', $tipologies->nome) }}" required>
        </div>

        {{-- Descrizione --}}
        <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione</label>
            <textarea name="descrizione" id="descrizione" class="form-control" rows="4" required>{{ old('descrizione', $tipologies->descrizione) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Aggiorna</button>
        <a href="{{ route('tipology.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection