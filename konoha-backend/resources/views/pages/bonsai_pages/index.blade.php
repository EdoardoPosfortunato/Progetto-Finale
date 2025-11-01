@extends('layouts.app')

@section('content')

    <div class="container my-5">
        <h1 class="display-6 text-center fs-1 fw-bold my-5">
            @if (isset($species))
                Bonsai della specie: {{ $species->nome }}
            @elseif (isset($tipologies))
                Bonsai della tipologia: {{ $tipologies->nome }}
            @else
                Lista Bonsai
            @endif
        </h1>

        @if (session('warning'))
            <div class="alert alert-danger mt-3">
                {{ session('warning') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="d-flex align-items-center">
                <form action="{{ route('bonsai.index') }}" method="GET" class="d-flex justify-content-center align-items-center mb-3 gap-2"
                    role="search">
                    <div class="input-group" style="max-width: 500px;">
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cerca ...">
                    </div>
                    <button class=" btn btn-outline-success d-flex" type="submit">
                    <i class="bi bi-search"></i> Cerca
                    </button>
                </form>
            </div>

            <div class="d-flex justify-content-end mb-4">
                <a href="{{ route('bonsai.create') }}" class="btn btn-success"> 
                    <i class="bi bi-plus-lg"></i> Aggiungi Bonsai
                </a>
            </div>

        </div>
        <ul class="list-group list-group-flush mt-5">


            @foreach ($bonsais as $bonsai)
                <div class="card mb-3 shadow-sm max-hight-10px">
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
                                <div>
                                    <p class="card-text"><span class="fst-italic">specie:</span> {{ $bonsai->species->nome }}
                                    </p>
                                    <p class="card-text"><span class="fst-italic">tipologia</span>
                                        @foreach ($bonsai->tipologies as $tipology)
                                            <span class="badge text-bg-light
                                                                                            @if(isset($tipologies) && $tipology->id === $tipologies->id)
                                                                                                border border-primary text-primary fw-bold
                                                                                            @endif">
                                                {{ $tipology->nome }}
                                            </span>
                                        @endforeach
                                    </p>
                                    <p class="card-text">{{ $bonsai->descrizione }}</p>
                                </div>
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