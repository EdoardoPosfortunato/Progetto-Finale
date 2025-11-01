@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h2 class="mb-4 text-center">Crea un nuovo Bonsai</h2>

  <form action="{{ route('bonsai.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="nome" class="form-label fs-5 fw-bold">Nome</label>
      <input type="text" name="nome" id="nome" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="descrizione" class="form-label fs-5 fw-bold">Descrizione</label>
      <textarea name="descrizione" id="descrizione" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3 d-flex flex-column flex-md-row gap-3">
      <div class="flex-fill">
        <label for="prezzo" class="form-label fs-5 fw-bold">Prezzo ($)</label>
        <input type="number" name="prezzo" id="prezzo" class="form-control" step="1" required>
      </div>

      <div class="flex-fill">
        <label for="species_id" class="form-label fs-5 fw-bold">Specie</label>
        <select name="species_id" id="species_id" class="form-select" required>
          <option value="">-- Seleziona specie --</option>
          @foreach ($species as $specie)
            <option value="{{ $specie->id }}">{{ $specie->nome }}</option>
          @endforeach
        </select>
      </div>

      <div class="flex-fill">
        <label for="altezza_cm" class="form-label fs-5 fw-bold">Altezza (cm)</label>
        <input type="number" name="altezza_cm" id="altezza_cm" class="form-control" step="1" min="0" required>
      </div>

      <div class="flex-fill">
        <label for="eta_anni" class="form-label fs-5 fw-bold">Età (anni)</label>
        <input type="number" name="eta_anni" id="eta_anni" class="form-control" step="1" min="0" required>
      </div>
    </div>

    <div class="mb-3">
      <label for="immagine" class="form-label fs-5 fw-bold">Immagine</label>
      <input type="file" name="immagine" id="immagine" class="form-control" accept="image/*">
      <small class="text-muted">Carica un'immagine del bonsai (formati: JPG, PNG, WEBP)</small>
    </div>

    <div class="my-3">
      <label class="form-label my-3 fs-5 fw-bold">Tipologie</label>
      <div class="d-flex flex-wrap gap-2">
        @foreach ($tipologies as $tipology)
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tipologies[]" value="{{ $tipology->id }}" id="tipology{{ $tipology->id }}">
            <label class="form-check-label" for="tipology{{ $tipology->id }}">
              {{ $tipology->nome }}
            </label>
          </div>
        @endforeach
      </div>
      <small class="text-muted text-center">Seleziona una o più tipologie</small>
    </div>

    <div class="d-flex justify-content-center align-items-center">
      <button type="submit" class="btn btn-success my-4">Salva Bonsai</button>
      <a href="{{ route('bonsai.index') }}" class="btn btn-outline-secondary ms-2 my-4">Annulla</a>
    </div>
  </form>
</div>
@endsection
