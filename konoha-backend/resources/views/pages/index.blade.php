@extends('layouts.app')

@section('content')

    <div class="container my-5">
        <h1 class="display-6 text-center fs-1 fw-bold">Lista dei Bonsai</h1>
        <ul class="list-group list-group-flush mt-5">
            <li class="list-group-item">
                <div class="d-flex justify-content-between container">
                    <div>
                        <p class="fs-4 fw-bold">Nome</p>
                    </div>
                    <p class="fs-4 fw-bold">Prezzo</p>
                    <div class="fs-4 fw-bold">Comandi</div>
                </div>
            </li>

            @foreach($bonsais as $bonsai)

                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('bonsai.show', $bonsai->id) }}" class="text-decoration-none">
                            <span>{{ $bonsai->id }} - </span>
                            <span>{{ $bonsai->nome }}</span>
                        </a>
                        <span>{{ $bonsai->prezzo }} $</span>

                        <div>
                            <a href="{{ route('bonsai.edit', $bonsai->id) }}" class="btn btn-outline-warning ">Modifica</a>

                            <x-delete-modal :id="$bonsai->id" title="Attenzione!!!" :message="'Vuoi davvero eliminare il Bonsai <strong>' . e($bonsai->nome) . '</strong>?'" :route="route('bonsai.destroy', $bonsai)" />
                        </div>
                    </div>
                </li>

            @endforeach

        </ul>

    </div>

@endsection