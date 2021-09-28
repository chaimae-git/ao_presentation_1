<?php

namespace App\Http\Livewire;

use App\Models\Adjudication;
use App\Models\Partenariat;
use Livewire\Component;
//
use App\Models\Ao;
use App\Models\Bu;
use App\Models\Client;
use App\Models\Critere_selection;
use App\Models\Departement;
use App\Models\ministere_de_tutelle;
use App\Models\Pays;
use App\Models\Secteur_activite;
use App\Models\Statut;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class AddAo extends Component
{

    public $status;


    use WithFileUploads;

    public $successMessage = '';

    public $catchError,$updateMode = false,$photos,$show_table = true,$Parent_id;

    public $chef_de_fil_options = [];

    public $currentStep = 1,

        // section_1,
        $num_AO, $date_limite, $pays_id,
        $type_id, $date_de_depot, $ministere_id,
        $secteur_id, $partenariat_id, $chef_de_fil_id, $montant_soumission,
        $budget, $n_lot, $client_id, $montant_c_p,
        $critere_selection_id, $adjudication_id, $objet,
        $cps, $rc, $avis,

        //section_2
        $select_partie_administratif, $select_partie_financiaire, $select_partie_technique,

        //partie_3
        $name, $location, $nom_location;

    public $adresse, $geom, $listLocations = [];


    public function firstStepSubmit()
    {

        $this->validate([
            'num_AO' => 'required|unique:aos,num_AO',
            'date_limite' => 'required',
            'pays_id' => 'required',
            'type_id' => 'required',
            'date_de_depot' => 'required',
            'ministere_id' => 'required',
            'secteur_id' => 'required',
            'partenariat_id' => 'required',
            'chef_de_fil_id' => 'required',
            'montant_soumission' => 'required|numeric',
            'budget' => 'required|numeric',
            'n_lot' => 'required|numeric',
            'client_id' => 'required',
            'montant_c_p' => 'required|numeric',
            'critere_selection_id' => 'required',
            'objet' => '',
            'adjudication_id'=>'required',
            'cps' => 'required',
            'rc' => 'required',
            'avis' => 'required',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {

        $this->validate([
            'select_partie_administratif' => 'required',
            'select_partie_financiaire' => 'required',
            'select_partie_technique' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function pushInListOfGeom($adresse, $geom){
        array_push($this->listLocations, ['adresse'=>$adresse, 'geom'=>$geom]);
    }

    public function submitForm(){

        $this->validate([
            'listLocations'=>'required'
        ]);

        try {
            $ao = new Ao();

            $ao->num_AO = $this->num_AO;
            $ao->date_limite = $this->date_limite;
            $ao->pays_id = $this->pays_id;
            $ao->type_id = $this->type_id;
            $ao->date_de_depot = $this->date_de_depot;
            $ao->ministere_id = $this->ministere_id;
            $ao->secteur_id = $this->secteur_id;
            $ao->chef_de_fil_id = $this->chef_de_fil_id;
            $ao->montant_soumission = $this->montant_soumission;
            $ao->budget = $this->budget;
            $ao->n_lot = $this->n_lot;
            $ao->client_id = $this->client_id;
            $ao->montant_c_p = $this->montant_c_p;
            $ao->critere_selection_id = $this->critere_selection_id;
            $ao->objet = $this->objet;
            $ao->adjudication_id = $this->adjudication_id;


            if (!empty($this->rc)) {
                $path = 'public/aos/' . $ao->num_AO . '/';
                $name_file = "rc." . $this->rc->extension();
                $this->rc->storeAs($path, $name_file);
                $ao->RC = $path . $name_file;
            } else {
                $ao->RC = '';
            }

            //$ao->RC = (!empty($request->rc))?$request->rc : '';
            if (!empty($this->cps)) {
                $path = 'public/aos/' . $ao->num_AO . '/';
                $name_file = "cps." . $this->cps->extension();
                $this->cps->storeAs($path, $name_file);
                $ao->CPS = $path . $name_file;
            } else {
                $ao->CPS = '';
            }

            if (!empty($this->avis)) {
                $path = 'public/aos/' . $ao->num_AO . '/';
                $name_file = "avis." . $this->avis->extension();
                $this->avis->storeAs($path, $name_file);
                $ao->avis = $path . $name_file;
            } else {
                $ao->avis = '';
            }

            /**************************/


             DB::transaction(function () use ($ao) {
                $ao->save();
                $ao->bus()->sync($this->select_partie_financiaire);
                $ao->departements()->sync($this->select_partie_technique);
                $ao->utilisateurs()->sync($this->select_partie_administratif);
                $ao->partenariats()->sync($this->partenariat_id);
                foreach($this->listLocations as $location){
                    //$stringoflocation = $location['stringofgeom'];
                    $geom = $location['geom'];
                    $ao->locations()->create([
                        'adresse'=>$location['adresse'],
                        'location'=>DB::raw("public.ST_SetSRID(public.ST_GeomFromGeoJSON('$geom'), 27700)"),
                    ]);
                }
            });
             $this->resetObject();

            //dd("success");
            $this->dispatchBrowserEvent('aoSaved');
            return redirect()->route('aos.consulter');
        } catch (Exception $e) {

        }
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }


    public function resetObject(){
        $this->num_AO = null;
        $this->date_limite = null;
        $this->pays_id = null;
        $this->type_id = null;
        $this->adjudication = null;
        $this->ministere_id = null;
        $this->secteur_id = null;
        $this->partenariat = null;
        $this->montant_soumission = null;
        $this->budget = null;
        $this->n_lot = null;
        $this->client_id = null;
        $this->montant_c_p = null;
        $this->critere_selection_id = null;
        $this->objet = null;
        $this->RC = null;
        $this->CPS = null;
        $this->geom = null;
        $this->select_partie_administratif = null;
        $this->select_partie_financiaire = null;
        $this->select_partie_technique = null;
        $this->listLocations = null;
    }

    public function saveFeatureToDb(){
        $this->dispatchBrowserEvent('saveToDb');
    }

    public function setChefDeFilOptions(){
        $chef_de_fil_options = Partenariat::whereIn('id', $this->partenariat_id)->orderBy('partenariat', 'asc')->get();
        $this->chef_de_fil_options =  $chef_de_fil_options;
    }

    public function render()
    {
        $data = [
            'bus' => Bu::orderBy('nom')->get(),
            'departements' => Departement::orderBy('nom')->get(),
            'secteur_activites' => Secteur_activite::orderBy('secteur')->get(),
            'pays' => Pays::orderBy('pays')->get(),
            'partenariats' => Partenariat::orderBy('partenariat')->get(),
            'ministere_tutelles' => ministere_de_tutelle::orderBy('ministere')->get(),
            'criteres_selections' => Critere_selection::orderBy('critere')->get(),
            'types' => Type::orderBy('type')->get(),
            'clients' => Client::orderBy('client')->get(),
            'adjudications' => Adjudication::orderBy('adjudication')->get(),
            'secretaires' => Statut::with('utilisateurs')->join('utilisateurs', 'statuts.id', '=', 'utilisateurs.statut_id')->where('statuts.statut', 'secretaire')->orderBy('utilisateurs.nom_prenom')->get(),
        ];
//        return view('livewire.ao-add-edit'/* , $data*/);
        return view('livewire.add-ao', $data);
    }
}


