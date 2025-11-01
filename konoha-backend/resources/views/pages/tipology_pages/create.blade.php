@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Aggiungi una nuova specie</h2>

    <form action="{{ route('tipology.store') }}" method="POST">
        @csrf

        {{-- Nome --}}
        <div class="mb-3">
            <label for="nome" class="form-label">Nome Tipologia</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        {{-- Descrizione --}}
        <div class="mb-3">
            <label for="descrizione" class="form-label">Descrizione</label>
            <textarea name="descrizione" id="descrizione" class="form-control" rows="4" required placeholder="...scrivi qua la descrizione della tipologia"></textarea>
        </div>

        <button type="submit" class="btn btn-success my-5 me-3">Salva</button>
        <a href="{{ route('tipology.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection