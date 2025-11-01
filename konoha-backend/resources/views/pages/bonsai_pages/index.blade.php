@extends('layouts.app')

@section('content')

    <div class="container my-5">
        <h1 class="display-6 text-center fs-1 fw-bold my-5">Lista Bonsai</h1>
        @if(isset($species))
            <h2 class="text-center text-muted mb-3">
                Bonsai della specie: <strong>{{ $species->nome_comune }}</strong>
            </h2>
        @endif

        <div class="d-flex justify-content-center mb-4">
            <a href="{{ route('bonsai.create') }}" class="btn btn-outline-success btn-lg">
                <i class="bi bi-plus-lg"></i> Aggiungi Bonsai
            </a>
        </div>
        <ul class="list-group list-group-flush mt-5">


            @foreach ($bonsais as $bonsai)
                <div class="card mb-3 shadow-sm">
                    <div class="row g-0 align-items-stretch">
                        {{-- Immagine cliccabile --}}
                        <div class="col-md-3">
                            <a href="{{ route('bonsai.show', $bonsai->id) }}" class="d-block h-100">
                                <div class="w-100 h-100 overflow-hidden">
                                    <img src="{{ $bonsai->immagine ? asset('storage/' . $bonsai->immagine) : asset('storage/placeholder.png') }}"
                                        alt="{{ $bonsai->nome }}" class="w-100 h-100" style="object-fit: cover;">
                                </div>
                            </a>
                        </div>

                        {{-- Contenuto cliccabile --}}
                        <div class="col-md-7" onclick="window.location='{{ route('bonsai.show', $bonsai->id) }}'"
                            style="cursor: pointer;">
                            <div class="card-body d-flex flex-column justify-content-around h-100">
                                <h5 class="card-title mb-1">{{ $bonsai->nome }}</h5>
                                <p class="card-text">{{ $bonsai->descrizione }}</p>
                                <p class="card-text fw-bold text-success">Prezzo: {{ $bonsai->prezzo }} $</p>
                            </div>
                        </div>

                        {{-- Bottoni sulla destra, fuori dal click --}}
                        <div class="col-md-2 d-flex flex-column justify-content-center align-items gap-2 pe-3">
                            <a href="{{ route('bonsai.edit', $bonsai->id) }}" class="btn btn-outline-warning ">Modifica</a>

                            <x-delete-modal :id="$bonsai->id" title="Attenzione!!!" :message="'Vuoi davvero eliminare il Bonsai <strong>' . e($bonsai->nome) . '</strong>?'" :route="route('bonsai.destroy', $bonsai)" />
                        </div>
                    </div>
                </div>
            @endforeach





        </ul>

    </div>

@endsection