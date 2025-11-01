@extends('layouts.app')

@section('content')
<div class="container my-5">
    {{-- Titolo e pulsante --}}
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="mb-0">Lista delle Tipologie</h2>
        <a href="{{ route('tipology.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Aggiungi Tipologia
        </a>
    </div>

    {{-- Lista delle tipologie --}}
    @foreach ($tipologies as $tipology)
 <div class="card mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div onclick="window.location='{{ route('bonsai.byTipology', $tipology->id) }}'">
                        <h5 class="card-title">{{ $tipology->nome }}</h5>
                        <p class="card-text">{{ $tipology->descrizione }}</p>
                    </div>
                    <div>
                        <a href="{{ route('tipology.edit', $tipology->id) }}" class="btn btn-outline-warning">Modifica</a>
                    </div>
                </div>
            </div>
    @endforeach
</div>
@endsection
