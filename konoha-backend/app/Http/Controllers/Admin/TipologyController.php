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
        $tipology = Tipology::with(['bonsais'])->get();
        $bonsais = Bonsai::with(['species', 'tipologies'])->get();

        return view("pages.tipology_pages.index_tipology", compact("tipology", "bonsais"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
