<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuRequest;
use App\Models\Bu;
use Exception;
use Illuminate\Http\Request;

class BuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.bus.consulter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bus.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuRequest $request)
    {
        try{
            $bu = new Bu();
            $bu->nom = $request->nom;
            $bu->description =$request->description;


            if($bu->save()){
                return redirect()->route('bus.consulter')->with('success', 'Bu Ajouté avec succes');
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
     * @param  \App\Models\Bu  $bu
     * @return \Illuminate\Http\Response
     */
    public function show(Bu $bu)
    {
        return view('pages.bus.afficher');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bu  $bu
     * @return \Illuminate\Http\Response
     */
    public function edit(Bu $bu)
    {
        return view('pages.bus.editer', compact('bu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bu  $bu
     * @return \Illuminate\Http\Response
     */
    public function update(BuRequest $request, Bu $bu)
    {
        try{
            $bu->nom = $request->nom;
            $bu->description =$request->description;

            if($bu->update()){
                return redirect()->route('bus.consulter')->with('success', 'Bu modifié avec succes');
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
     * @param  \App\Models\Bu  $bu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bu $bu)
    {
        try{
            if($bu->delete()){
                return redirect()->route('bus.consulter')->with('success', 'Bu supprimé avec succée');
            }else{
                throw new Exception('il y a un érreur de supprission');
            }

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['erreur : '=>$e->getMessage()]);
        }
    }
}
