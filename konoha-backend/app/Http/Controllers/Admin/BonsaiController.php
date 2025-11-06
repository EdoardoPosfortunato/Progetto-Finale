<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bonsai;
use App\Models\Species;
use App\Models\Tipology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BonsaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Bonsai::query()->with(['species', 'tipologies']);

    // Se c'è un termine di ricerca
    if ($request->filled('q')) {
        $search = $request->input('q');
        $query->where(function ($q) use ($search) {
            $q->where('nome', 'like', "%{$search}%")
              ->orWhere('descrizione', 'like', "%{$search}%");
        });
    }

    $bonsais = $query->get();

    return view('pages.bonsai_pages.index', compact('bonsais'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //    $species = $bonsai->species;
        $tipologies = Tipology::all();
        $species = Species::all();

        return view('pages.bonsai_pages.create', compact('tipologies', 'species'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $newBonsai = new Bonsai();


        // dd($request->all());

        $newBonsai = new Bonsai();
        $newBonsai->nome = $data['nome'];
        $newBonsai->descrizione = $data['descrizione'] ?? null;
        $newBonsai->prezzo = $data['prezzo'];
        $newBonsai->species_id = $data['species_id'];
        $newBonsai->altezza_cm = $data['altezza_cm'];
        $newBonsai->eta_anni = $data['eta_anni'];

        if (array_key_exists("immagine", $data)) {
            $img_path = Storage::putFile('Bonsais_img', $data['immagine']);
            $newBonsai->immagine = $img_path;
        }

        $newBonsai->save();

        if (!empty($data['tipologies'])) {
            $newBonsai->tipologies()->attach($data['tipologies']);
        }

        return redirect()->route('bonsai.show', $newBonsai)->with('success', 'Bonsai creato con successo!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Bonsai $bonsai)
    {
        $species = $bonsai->species;
        $tipologies = $bonsai->tipologies;

        // dd( $species );

        return view('pages.bonsai_pages.show', compact('bonsai', 'species', 'tipologies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bonsai $bonsai)
    {
        $tipologies = Tipology::all();
        $species = Species::all();

        return view('pages.bonsai_pages.update', compact('bonsai', 'species', 'tipologies'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bonsai $bonsai)
    {

        $data = $request->all();

        $bonsai->nome = $data['nome'];
        $bonsai->descrizione = $data['descrizione'] ?? null;
        $bonsai->prezzo = $data['prezzo'];
        $bonsai->species_id = $data['species_id'];
        $bonsai->altezza_cm = $data['altezza_cm'];
        $bonsai->eta_anni = $data['eta_anni'];

        if (array_key_exists("immagine", $data)) {
            $img_path = Storage::putFile('Bonsais_img', $data['immagine']);
            $bonsai->immagine = $img_path;
        }

        $bonsai->update();

        if ($request->has('tipologies')) {
            $bonsai->tipologies()->sync($data['tipologies']);
        } else {
            $bonsai->tipologies()->detach();
        }

        return redirect()->route('bonsai.show', $bonsai)->with('success', 'Bonsai creato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bonsai $bonsai)
    {
        if ($bonsai->immagine) {
            Storage::delete($bonsai->immagine);
        }

        $bonsai->tipologies()->detach();
        $bonsai->delete();

        return redirect()->route('bonsai.index')->with('success', 'Bonsai eliminato con successo!');
    }

public function bySpecie(Species $species)
    {
        $bonsais = Bonsai::where('species_id', $species->id)->get();

        // Se non ci sono risultati, redirect all'index
        if ($bonsais->isEmpty()) {
            return redirect()
                ->route('bonsai.index')
                ->with('warning', "Nessun bonsai trovato per la specie '{$species->nome}'.");
        }

        return view('pages.bonsai_pages.index', compact('bonsais', 'species'));
    }

    public function byTipology(Tipology $tipologies)
    {
        $bonsais = $tipologies->bonsais;


        // Se non ci sono risultati, redirect all'index
        if ($bonsais->isEmpty()) {
            return redirect()
                ->route('bonsai.index')
                ->with('warning', "Nessun bonsai trovato per la tipologia '{$tipologies->nome}'.");
        }

        return view('pages.bonsai_pages.index', compact('bonsais', 'tipologies'));
    }


}
