@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <h2 class="mb-3 text-center my-5">Dettaglio Bonsai #{{ $bonsai->id }}</h2>

    <div class="card">
      @if ($bonsai->immagine)
        <img src="{{ asset('storage/' . $bonsai->immagine) }}" class="card-img-top img-fluid" alt="Immagine Bonsai"
          style="max-width: 100%; max-height: 300px; object-fit: cover;">
      @endif

      <div class="card-body">
        <h5 class="card-title">{{ $bonsai->nome }}</h5>
        <hr>
        <p class="card-text"><strong>Descrizione:</strong> {{ $bonsai->descrizione }}</p>
        <p class="card-text"><strong>Prezzo:</strong> {{ $bonsai->prezzo }} $</p>
        <p class="card-text"><strong>Specie:</strong> {{ $species->nome ?? 'N/D' }}</p>
        <p class="card-text"><strong>Tipologia:</strong>
          @foreach ($bonsai->tipologies as $tipology)
            <span class="badge bg-primary">{{ $tipology->nome }}</span>
          @endforeach
        </p>
        <div class="d-flex my-5 justify-content-center gap-3">
          <a href="{{ route('bonsai.index') }}" class="btn btn-outline-primary ">Torna alla lista</a>
          <a href="{{ route('bonsai.edit', $bonsai->id) }}" class="btn btn-outline-warning">Modifica</a>

          <x-delete-modal 
          :id="$bonsai->id" 
          title="Attenzione!!!" 
          :message="'Vuoi davvero eliminare il Bonsai <strong>' . e($bonsai->nome) . '</strong>?'" :route="route('bonsai.destroy', $bonsai)" />

        </div>
      </div>
    </div>
  </div>
  </div>
@endsection