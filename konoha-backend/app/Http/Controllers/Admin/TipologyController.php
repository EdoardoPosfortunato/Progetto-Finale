<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bonsai;
use App\Models\Tipology;
use Illuminate\Http\Request;

class TipologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipologies = Tipology::with(['bonsais'])->get();
        $bonsais = Bonsai::with(['species', 'tipologies'])->get();

        return view("pages.tipology_pages.index_tipology", compact("tipologies", "bonsais"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('pages.species_pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newTipology = new Tipology();

        $newTipology->nome = $data['nome'];
        $newTipology->descrizione = $data['descrizione'] ?? null;

        $newTipology->save();

        return redirect()->route('tipology.index');
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
    public function edit(Tipology $tipologies)
    {
         return view('pages.tipology_pages.edit', compact('tipologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipology $tipologies)
    {
        $data = $request->all();
        
        $tipologies->nome = $data['nome'];
        $tipologies->descrizione = $data['descrizione'] ?? null;

        $tipologies->update();

        return redirect()->route('tipology.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
