
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex flex-column gap-5 row-cols-1 g-4 align-items-center justify-content-center">
        {{-- Card 1 --}}
        <div class="col text-center">
            <a href="{{ route('bonsai.index') }}" class="text-decoration-none">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Lista bonsai</h5>
                    </div>
                </div>
            </a>
        </div>

        {{-- Card 2 --}}
        <div class="col text-center">
            <a href="{{ route('species.index') }}" class="text-decoration-none">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Lista delle Specie</h5>
                        <!-- <p class="card-text">Descrizione breve della seconda card.</p> -->
                    </div>
                </div>
            </a>
        </div>

        {{-- Card 3 --}}
        <div class="col text-center">
            <a href="{{ route('tipology.index') }}" class="text-decoration-none">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Lista delle Tipologie</h5>
                        <!-- <p class="card-text">Descrizione breve della terza card.</p> -->
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection