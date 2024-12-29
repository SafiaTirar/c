<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\Http\Requests\FormateurRequest;


class formateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formateurs = User::all();
        return view('formateurs.index', compact('formateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('formateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormateurRequest $request)
    {
        User::create($request->all());
        return redirect()->route('formateurs.index')->with('success', 'Formateur bien ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $formateur = User::find($id);
        return view('formateurs.show', compact('formateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formateur = User::find($id);
        return view('formateurs.edit', compact('formateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormateurRequest $request, string $id)
    {
        $formateur = User::find($id);
        $formateur->update($request->all());
        return redirect()->route('formateurs.index')->with('success', 'Formateur bien modifie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formateur = User::find($id);
        $formateur->delete();
        return redirect()->route('formateurs.index');
    }
}
