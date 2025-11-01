<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bonsai;
use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $species = Species::with(['bonsais'])->get();
        $bonsais = Bonsai::with(['species', 'tipologies'])->get();

        return view("pages.species_pages.index_species", compact("species", "bonsais"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.species_pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $newSpecies = new Species();

        $newSpecies->nome = $data['nome'];
        $newSpecies->descrizione = $data['descrizione'] ?? null;

        $newSpecies->save();

        return redirect()->route('species.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Species $species)
    {
        //
        return view('pages.species_pages.edit', compact('species'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Species $species)
    {
        //

        $data = $request->all();

        $species->nome = $data['nome'];
        $species->descrizione = $data['descrizione'] ?? null;

        $species->update();

        return redirect()->route('species.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
