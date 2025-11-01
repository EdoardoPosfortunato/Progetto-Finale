@extends('layouts.app')

@section('content')
<div class="container mt-4">
    {{-- Titolo e pulsante --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Lista delle Tipologie</h2>
        <a href="{{ route('tipology.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Aggiungi Tipologia
        </a>
    </div>

    {{-- Lista delle tipologie --}}
    @foreach ($tipologies as $tipology)
        <div class="card mb-3 shadow-sm">
            <h5 class="card-header">{{ $tipology->categoria ?? 'Tipologia' }}</h5>
            <div class="card-body">
                <h5 class="card-title">{{ $tipology->nome }}</h5>
                <p class="card-text">{{ $tipology->descrizione }}</p>
                <a href="{{ route('tipology.show', $tipology->id) }}" class="btn btn-primary">Dettagli</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
