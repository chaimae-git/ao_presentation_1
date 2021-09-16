<?php

namespace App\Http\Controllers;

use App\Classes\Location;
use App\Models\Ao;
use App\Models\Bu;
use App\Models\Critere_selection;
use App\Models\Departement;
use App\Models\ministere_de_tuelle;
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
        $bus = Bu::orderBy('nom')->get();
        $departements = Departement::orderBy('nom')->get();
        $secteur_activites = Secteur_activite::orderBy('secteur')->get();
        $pays = Pays::orderBy('pays')->get();
        $ministere_tuelles = ministere_de_tuelle::orderBy('ministere')->get();
        $criteres_selections = Critere_selection::orderBy('critere')->get();
        $types = Type::orderBy('type')->get();
        $clients = Client::orderBy('client')->get();
        //query pour choisir les secretaires parmis les utitilisateurs
        $secretaires = Statut::with('utilisateurs')->join('utilisateurs', 'statuts.id', '=', 'utilisateurs.statut_id')->where('statuts.statut', 'secretaire')->orderBy('utilisateurs.nom_prenom')->get();
        return view('pages.aos.ajouter', compact('types', 'bus', 'departements', 'pays', 'secretaires', 'secteur_activites', 'ministere_tuelles', 'criteres_selections', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'n_ao' => 'required|unique:aos,num_AO',
            'date_limite' => 'required',
            'pays_id' => 'required',
            'type_id' => 'required',
            'date_adjudication' => 'required',
            'ministere_id' => 'required',
            'secteur_id' => 'required',
            'partenariat' => 'required',
            'montant_soumission' => 'required|numeric',
            'budget' => 'required|numeric',
            'n_lot' => 'required|numeric',
            'client_id' => 'required',
            'montant_c_p' => 'required|numeric',
            'critere_selection_id' => 'required',
            'objet' => '',
            'cps' => 'required',
            'rc' => 'required',
            'utilisateurs_ids' => 'required',
            'bus_ids' => 'required',
            'departements_ids' => 'required',
        ]);
        try{
            $ao = new Ao();
            $ao->num_AO = $request->n_ao;
            $ao->date_limite = $request->date_limite;
            $ao->pays_id = $request->pays_id;
            $ao->type_id = $request->type_id;
            $ao->date_adjudication = $request->date_adjudication;
            $ao->ministere_id = $request->ministere_id;
            $ao->secteur_id = $request->secteur_id;
            $ao->partenariat = (!empty($request->partenariat))?$request->partenariat : '';
            $ao->montant_soumission = $request->montant_soumission;
            $ao->budget = $request->budget;
            $ao->n_lot = $request->n_lot;
            $ao->client_id = $request->client_id;
            $ao->montant_c_p = $request->montant_c_p;
            $ao->critere_selection_id = $request->critere_selection_id;
            $ao->objet = (!empty($request->objet))?$request->objet : '';

            /********* fichiers*********/

            //$ao->RC = (!empty($request->rc))?$request->rc : '';
            if($request->hasFile('rc')){
                $tmp_file = $request->file('rc');
                if($tmp_file->isValid()){
                    $path = 'public/aos/'.$ao->num_AO.'/';
                    //mkdir($path);
                    $name_file = "rc.".$tmp_file->extension();
                    $tmp_file->storeAs($path, $name_file);
                    $ao->RC = $path.$name_file;
                }
            }else{
                $ao->RC = '';
            }

            //$ao->RC = (!empty($request->rc))?$request->rc : '';
            if($request->hasFile('cps')){
                $tmp_file = $request->file('cps');
                if($tmp_file->isValid()){
                    $path = 'public/aos/'.$ao->num_AO.'/';
                    //mkdir($path);
                    $name_file = "cps.".$tmp_file->extension();
                    $tmp_file->storeAs($path, $name_file);
                    $ao->CPS = $path.$name_file;
                }
            }else{
                $ao->CPS = '';
            }
            /**************************/


            /********partie_*******/

            //$ao->adresse = (!empty($request->adresse))?$request->adresse : '';

            $ao->geom = (!empty($request->geom))?$request->geom : '';

            $locations = $this->get_locations();
            //print_r($locations);
            //die(count($locations));
            //die();

            DB::transaction(function() use($ao, $request, $locations){
                $ao->save();
                $ao->bus()->sync($request->bus_ids);
                $ao->departements()->sync($request->departements_ids);//[1,2,5]
                $ao->utilisateurs()->sync($request->utilisateurs_ids);
                foreach($locations as $location){
                    //$stringoflocation = $location['stringofgeom'];
                    $ao->locations()->create([
                        'adresse'=>$location->adresse,
                        'location'=>$location->buildQuery(),
                    ]);
                }
            });

            return redirect()->route('aos.consulter')->with('success', 'AO ajouté avec succès');

        }catch(Exception $e){
            return redirect()->back()->with('erreur', 'erreur : '. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ao  $ao
     * @return \Illuminate\Http\Response
     */
    public function show(Ao $ao)
    {
        return view('pages.aos.afficher');
    }

    public function get_locations(){
        $this->locations = Session::get('location_o_l');
        Session::forget('location_o_l');
        return $this->locations;
    }

    public function add_location(Request $request){
        //dd($request->adresseofgeom);
        $location = (new Location($request->adresseofgeom, $request->stringofgeom));
        //$location->storeLocation();
        Session::push('location_o_l', $location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ao  $ao
     * @return \Illuminate\Http\Response
     */
    public function edit(Ao $ao)
    {
        $bus = Bu::orderBy('nom')->get();
        $departements = Departement::orderBy('nom')->get();
        $secteur_activites = Secteur_activite::orderBy('secteur')->get();
        $pays = Pays::orderBy('pays')->get();
        $ministere_tuelles = ministere_de_tuelle::orderBy('ministere')->get();
        $criteres_selections = Critere_selection::orderBy('critere')->get();
        $types = Type::orderBy('type')->get();
        $clients = Client::orderBy('client')->get();
        $secretaires = Statut::with('utilisateurs')->join('utilisateurs', 'statuts.id', '=', 'utilisateurs.statut_id')->where('statuts.statut', 'secretaire')->orderBy('utilisateurs.nom_prenom')->get();
        $utilisateurs_ids =  [];
        foreach($ao->utilisateurs()->get() as $utilisateur_id){
            $utilisateurs_ids[] = $utilisateur_id->pivot->utilisateur_id;
        }
        $bus_ids =  [];
        foreach($ao->bus()->get() as $bu_id){
            $bus_ids[] = $bu_id->pivot->bu_id;
        }
        $departements_ids = [];
        foreach ($ao->departements()->get() as $departement_id){
            $departements_ids[] = $departement_id->pivot->departement_id;
        }
        //dd($departements_ids);
        return view('pages.aos.editer', compact('ao', 'bus', 'departements', 'pays', 'secteur_activites', 'ministere_tuelles', 'criteres_selections', 'types', 'clients', 'secretaires', 'utilisateurs_ids', 'bus_ids', 'departements_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ao  $ao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ao $ao)
    {
        try{
            $ao->num_AO = $request->n_ao;
            $ao->date_limite = $request->date_limite;
            $ao->pays_id = $request->pays_id;
            $ao->type_id = $request->type_id;
            $ao->date_adjudication = $request->date_adjudication;
            $ao->ministere_id = $request->ministere_id;
            $ao->secteur_id = $request->secteur_id;
            $ao->partenariat = (!empty($request->partenariat))?$request->partenariat : '';
            $ao->montant_soumission = $request->montant_soumission;
            $ao->budget = $request->budget;
            $ao->n_lot = $request->n_lot;
            $ao->client_id = $request->client_id;
            $ao->montant_c_p = $request->montant_c_p;
            $ao->critere_selection_id = $request->critere_selection_id;
            $ao->objet = (!empty($request->objet))?$request->objet : '';


            /********* fichiers*********/

            //$ao->RC = (!empty($request->rc))?$request->rc : '';
            if($request->hasFile('rc')){
                $tmp_file = $request->file('rc');
                if($tmp_file->isValid()){
                    $path = 'public/aos/'.$ao->num_AO.'/';
                    //mkdir($path);
                    $name_file = "rc.".$tmp_file->extension();
                    $tmp_file->storeAs($path, $name_file);
                    $ao->RC = $path.$name_file;
                }
            }

            //$ao->RC = (!empty($request->rc))?$request->rc : '';
            if($request->hasFile('cps')){
                $tmp_file = $request->file('cps');
                if($tmp_file->isValid()){
                    $path = 'public/aos/'.$ao->num_AO.'/';
                    //mkdir($path);
                    $name_file = "cps.".$tmp_file->extension();
                    $tmp_file->storeAs($path, $name_file);
                    $ao->CPS = $path.$name_file;
                }
            }

            /**************************/


            /********partie_*******/

            //$ao->adresse = (!empty($request->adresse))?$request->adresse : '';
            $ao->geom = (!empty($request->geom))?$request->geom : '';


            DB::transaction(function() use($ao, $request){
                $ao->update();
                $ao->bus()->sync($request->bus_ids);
                $ao->departements()->sync($request->departements_ids);
                $ao->utilisateurs()->sync($request->utilisateurs_ids);
            });
            return redirect()->route('aos.consulter')->with('success', 'AO Ajouté avec succes');
        }catch(\Exception $e){
            return redirect()->back()->with('erreur', $e->getMessage());
        }
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

    public function administration_joindre_un_fichier(Ao $ao=null, Request $request=null){
        if($request && $request->isMethod('post')){
            dd($request);
        }
        $type = 1;
        $fichiers = [];
        return view('pages.aos.preparation_reponses.administrative.joindre_un_fichier', compact('ao', 'type', 'fichiers'));
    }
}
