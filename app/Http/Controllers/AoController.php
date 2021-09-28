<?php

namespace App\Http\Controllers;

use App\Classes\Location;
use App\Models\Ao;
use App\Models\Bu;
use App\Models\Critere_selection;
use App\Models\Departement;
use App\Models\ministere_de_tuelle;
use App\Models\Partenariat;
use App\Models\Partie;
use App\Models\Pays;
use App\Models\Secteur_activite;
use App\Models\Critere_adjudication;
use App\Models\Client;
use App\Models\Statut;
use App\Models\Type;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AoController extends Controller
{

    public $locations;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aos = Ao::all();
        return view('pages.aos.consulter', compact('aos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.aos.ajouter');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ao  $ao
     * @return \Illuminate\Http\Response
     */
    public function show(Ao $ao)
    {
        $partie_administratif = Partie::where('partie', 'partie administratif')->first()->id;
        $partie_financiaire = Partie::where('partie', 'partie financiaire')->first()->id;
        $partie_technique = Partie::where('partie', 'partie technique')->first()->id;
        return view('pages.aos.afficher', compact('ao', 'partie_administratif', 'partie_financiaire', 'partie_technique'));
    }


    public function edit(Ao $ao)
    {
        return view('pages.aos.editer', compact('ao'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ao  $ao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ao $ao)
    {
        try{
            if($ao->delete()){
                return redirect()->route('aos.consulter')->with('success', 'Utilisateur supprimé avec succée');
            }else{
                throw new Exception('il y a une erreur de supprission');
            }

        }catch(\Exception $e){
            return redirect()->back()->with('erreur', $e->getMessage());
        }
    }


    public function downloadFile(Request $request){
        if(Storage::path($request->file)){
            $path = Storage::path($request->file);
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'content-type'=>mime_content_type($path)
            ]);
        }
        return redirect('/404');
    }
}
