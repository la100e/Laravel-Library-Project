<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Categorie;
use Illuminate\Http\Request;

class AuteursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $selectedAuteur = Auteur::find($id);
        // $selectedCategoryId = $id;
        $livres = $selectedAuteur->livres;
        $categories = Categorie::all();
        return view('index', compact('categories', 'selectedAuteur', 'livres'));
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
