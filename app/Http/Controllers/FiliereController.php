<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Filliere;


class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filliere::all();
        return view('filieres.index', compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filieres.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|unique:fillieres,titre',
            'description' => 'required',
        ],
        [
            'titre.required' => 'champ Obligatoire',
            'titre.unique' => 'titre deja exist',
            'description.required' => 'champ Obligatoire',
        ]);
        
        $titre = $request->input('titre');
        $description = $request->input('description');


        Filliere::create([
                            'titre' =>$titre,
                            'description' =>$description,
                        ]);
        return redirect()->route('filieres.index')->with('success', 'Filiere bien ajoute');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $filiere = Filliere::find($id);
        // $groupes = $filiere->groupes;
        // return view('filieres.show', compact('filiere','groupes'));
        // return view('filieres.show', compact('filiere'));
        $filiere = Filliere::find($id);

    if (!$filiere) {
        return redirect()->route('filieres.index')->with('error', 'Filière non trouvée');
    }

    return view('filieres.show', compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $filiere = Filliere::find($id);
        return view('filieres.edit', compact('filiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $filiere = Filliere::find($id);

        $data = $request->validate([
            'titre' => 'required|unique:fillieres,titre,'. $filiere->id,
            'description' => 'required',
        ],
        [
            'titre.required' => 'champ Obligatoire',
            'titre.unique' => 'titre deja exist',
            'description.required' => 'champ Obligatoire',
        ]);

        $filiere->titre = $request->input('titre');
        $filiere->description = $request->input('description');

        $filiere->save();
        return redirect()->route('filieres.index')->with('success', 'Filiere bien modifie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $filiere = Filliere::find($id);
        $filiere->delete();
        return redirect()->route('filieres.index');
    }
}
