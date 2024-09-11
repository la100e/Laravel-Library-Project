<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivresController extends Controller
{

    public function home() {
        $categories = Categorie::all();
        $livres = Livre::orderByDesc('created_at')->limit(3)->get();
        return view('home', compact('categories', 'livres'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $livres = Livre::query()->inRandomOrder()->paginate(6);
        $livres = Livre::query()->inRandomOrder()->get();
        $categories = Categorie::all();
        return view('index', compact('livres', 'categories'));
    }

    public function myview () {
        $livres = Livre::query()->inRandomOrder()->get();
        return response()->json($livres);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auteurs = Auteur::all();
        $categories = Categorie::all();
        return view('create', compact('auteurs', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required|string',
            'titre' => 'required|string',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'description' => 'required|string',
            'auteur' => 'required|min:1',
            'categorie' => 'required|min:1',
            'image' => 'required|image',
        ]);

        $livre = new Livre();

        $livre->isbn = $request->isbn;
        $livre->titre = $request->titre;
        $livre->prix = $request->prix;
        $livre->quantite = $request->quantite;
        $livre->description = $request->description;
        $livre->auteur_id = $request->auteur;
        $livre->categorie_id = $request->categorie;

        $image = $request->file('image');
        $name = uniqid().$image->getClientOriginalName();
        $image->move(public_path('images'), $name);
        $livre->image = 'images/' . $name;
        $livre->save();

        return redirect()->route('livres.index')->with(['success'=> 'Livre bien ajoute !']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livre = Livre::find($id);
        // $similarBooks = Livre::where('auteur_id', '=', $livre->auteur_id)
        //                       ->orWhere('categorie_id', '=', $livre->categorie_id)
        //                     //   ->where('id', '!=', $livre->id)
        //                       ->inRandomOrder()
        //                       ->limit(4)
        //                       ->get();
        // $similarBooks->filter(function ($book) use ($livre){
        //     return $book->id != $livre->id;
        // });
        $similarBooks = Livre::where(function($query) use ($livre) {
                                $query->where('auteur_id', '=', $livre->auteur_id)
                                    ->orWhere('categorie_id', '=', $livre->categorie_id);
                            })
                            ->where('id', '!=', $livre->id)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();
        $recommendedBooks = Livre::inRandomOrder()->limit(4)->get();

        $categories = Categorie::all();
        return view('show', compact('livre', 'categories', 'similarBooks', 'recommendedBooks'));
    }

    public function search(Request $request) {
        $request->validate([
           'search' =>'required|string'
        ]);
        $authorsIds = Auteur::where('nom', 'like', '%' . $request->search . '%')
                            ->orWhere('prenom', 'like', '%' . $request->search . '%')
                            ->pluck('id');
        $livres = Livre::where('titre', 'like', '%' . $request->search . '%')
                            ->orWhere('isbn', 'like', '%' . $request->search . '%')
                            ->orWhereIn('auteur_id', $authorsIds)
                            ->get();
        $categories = Categorie::all();
        return view('index', compact('livres', 'categories'));
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
