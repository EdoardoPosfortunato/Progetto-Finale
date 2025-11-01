
@extends('layouts.app')

@section('content')
<div class="container py-5">

  <div class="d-flex flex-column align-items-center justify-content-center my-5">
    <!-- Carta 1: Area Admin -->
    <div class="col-md-5 mb-4">
      <div class="card shadow-sm h-100 bg-green-100">
        <div class="card-body text-center">
          <h4 class="card-title mb-3">Accedi</h4>
          <p class="card-text">Gestisci bonsai, specie, tipologie e utenti. Accesso riservato agli amministratori.</p>
          <a href="{{ route('login') }}" class="btn btn-outline-success mt-3">Accedi</a>
        </div>
      </div>
    </div>

    <!-- Carta 2: Area Utente -->
    <div class="col-md-5 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <h4 class="card-title mb-3">Registrati</h4>
          <p class="card-text">Esplora la collezione di bonsai, scopri le tipologie e visualizza i dettagli.</p>
          <a href="{{ route('register') }}" class="btn btn-outline-primary mt-3">Registrati</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
