<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Groupe;
use App\models\Filliere;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Groupe::all();
        return view('groupes.index', compact('groupes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres = Filliere::all();
        return view('groupes.create', compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(([
            'libelle' => 'required',
            'filliere_id' => 'required',
        ]));

        $request->validate([
            'libelle' => 'required|alpha_num|unique:groupes,libelle',
            'filliere_id' => 'required',
        ],
        [
            'libelle.required' => 'champ Obligatoire',
            'libelle.alpha_num' => 'champ doit etre alpha numerique',
            'libelle.unique' => 'ce groupe est deja exist',
            'filliere_id.required' => 'champ Obligatoire',
        ]
    );
        Groupe::create($data);
        return redirect()->route('groupes.index')->with('success', 'Groupe bien ajoute');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $groupe = Groupe::find($id);
        $filiere = $groupe->filiere;
        $nom_filiere = $filiere->titre;
        $stagiaires = $groupe->stagiaires;
        // $nom_filiere = Filiere::find($groupe->filiere_id)->titre;
        return view('groupes.show', compact('groupe','nom_filiere','stagiaires'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groupe = Groupe::find($id);
        $filiers = Filliere::all();
        return view('groupes.edit', compact('groupe', 'filiers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $groupe = Groupe::find($id);
        $data = $request->validate([
            'libelle' => 'required|alpha_num|unique:groupes,libelle,'.$groupe->id,
            'filliere_id' => 'required'
        ],
        [
            'libelle.required' => 'champ Obligatoire',
            'libelle.alpha_num' => 'champ doit etre alpha numerique',
            'libelle.unique' => 'ce groupe est deja exist',
            'filliere_id.required' => 'champ Obligatoire',
        ]);
        $groupe->update($data);
        return redirect()->route('groupes.index')->with('success', 'Groupe bien modifie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $groupe = Groupe::find($id);

        if ($groupe) {
            $groupe->delete();
            return back()->with('success', 'Groupe deleted successfully!');
        } else {
            return back()->with('error', 'Groupe not found!');
        }
    
    }
}
