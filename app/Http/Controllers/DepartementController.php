<?php

namespace App\Http\Controllers;

use App\Models\Bu;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = Departement::all();
        return view('pages.departements.consulter', compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bus = Bu::orderBy('nom')->get();
        return view('pages.departements.ajouter', compact('bus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $departement = new Departement();
            $departement->bu_id = $request->bu_id;
            $departement->nom = $request->nom;
            $departement->description =$request->description;

            if($departement->save()){
                return redirect()->route('departements.consulter')->with('success', 'département Ajouté avec succes');
            }else{
                throw new Exception('il y a une erreur de saisie');
            }
        }catch(Exception $e){
            return redirect()->back()->with('erreur', 'érreur : '. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        return view('pages.departements.afficher', compact('departement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        $bus = Bu::orderBy('nom')->get();
        return view('pages.departements.editer', compact('departement', 'bus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departement $departement)
    {
        try{
            $departement->bu_id = $request->bu_id;
            $departement->nom = $request->nom;
            $departement->description =$request->description;

            if($departement->update()){
                return redirect()->route('departements.consulter')->with('success', 'département modifié avec succes');
            }else{
                throw new Exception('il y a une erreur de modification');
            }
        }catch(Exception $e){
            return redirect()->back()->with('erreur', 'érreur : '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $departement)
    {
        try{
            if($departement->delete()){
                return redirect()->route('departements.consulter')->with('success', 'Utilisateur supprimé avec succée');
            }else{
                throw new Exception('il y a un érreur de supprission');
            }

        }catch(\Exception $e){
            return redirect()->back()->withErrors('erreur', $e->getMessage());
        }
    }
}
