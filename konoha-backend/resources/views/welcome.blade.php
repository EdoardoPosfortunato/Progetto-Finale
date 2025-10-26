
@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="text-center mb-5">Benvenuto su Konoha 🌿</h1>

  <div class="row justify-content-center">
    <!-- Carta 1: Area Admin -->
    <div class="col-md-5 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <h4 class="card-title mb-3">Area Admin</h4>
          <p class="card-text">Gestisci bonsai, specie, tipologie e utenti. Accesso riservato agli amministratori.</p>
          <a href="{{ route('login') }}" class="btn btn-primary mt-3">Accedi</a>
        </div>
      </div>
    </div>

    <!-- Carta 2: Area Utente -->
    <div class="col-md-5 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <h4 class="card-title mb-3">Area Utente</h4>
          <p class="card-text">Esplora la collezione di bonsai, scopri le tipologie e visualizza i dettagli.</p>
          <a href="{{ route('bonsai.index') }}" class="btn btn-success mt-3">Entra</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
