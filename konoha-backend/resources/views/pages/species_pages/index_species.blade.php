@extends('layouts.app')

@section('content')
    <div class="container my-5">
        {{-- Titolo e pulsante --}}
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="mb-0">Lista delle Specie</h2>
            <a href="{{ route('species.create') }}" class="btn btn-success btn-bg">
                <i class="bi bi-plus-lg"></i> Aggiungi Specie
            </a>
        </div>

        {{-- Lista delle specie --}}
        @foreach ($species as $specie)
            <div class="card mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div onclick="window.location='{{ route('bonsai.bySpecie', $specie->id) }}'">
                        <h5 class="card-title">{{ $specie->nome }}</h5>
                        <p class="card-text">{{ $specie->descrizione }}</p>
                    </div>
                    <div>
                        <a href="{{ route('species.edit', $specie->id) }}" class="btn btn-outline-warning">Modifica</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection