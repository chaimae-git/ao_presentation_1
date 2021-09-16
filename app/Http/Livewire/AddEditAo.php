<?php

namespace App\Http\Livewire;

use Livewire\Component;
//
use App\Models\Ao;
use App\Models\Bu;
use App\Models\Client;
use App\Models\Critere_selection;
use App\Models\Departement;
use App\Models\ministere_de_tuelle;
use App\Models\Pays;
use App\Models\Secteur_activite;
use App\Models\Statut;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class AddEditAo extends Component
{

    public $status;


    use WithFileUploads;

    public $successMessage = '';

    public $catchError,$updateMode = false,$photos,$show_table = true,$Parent_id;

    public $currentStep = 1,

        // section_1,
        $num_AO, $date_limite, $pays_id,
        $type_id, $date_adjudication, $ministere_id,
        $secteur_id, $partenariat, $montant_soumission,
        $budget, $n_lot, $client_id, $montant_c_p,
        $critere_selection_id, $objet,
        $cps, $rc,

        //section_2
        $select_partie_administratif, $select_partie_financiaire, $select_partie_technique,

        //partie_3
        $name, $location, $nom_location;

    public function render()
    {
        $data = [
            'bus' => Bu::orderBy('nom')->get(),
            'departements' => Departement::orderBy('nom')->get(),
            'secteur_activites' => Secteur_activite::orderBy('secteur')->get(),
            'pays' => Pays::orderBy('pays')->get(),
            'ministere_tuelles' => ministere_de_tuelle::orderBy('ministere')->get(),
            'criteres_selections' => Critere_selection::orderBy('critere')->get(),
            'types' => Type::orderBy('type')->get(),
            'clients' => Client::orderBy('client')->get(),
            'secretaires' => Statut::with('utilisateurs')->join('utilisateurs', 'statuts.id', '=', 'utilisateurs.statut_id')->where('statuts.statut', 'secretaire')->orderBy('utilisateurs.nom_prenom')->get(),
        ];
//        return view('livewire.ao-add-edit'/* , $data*/);
        return view('livewire.add-edit-ao', $data);
    }
    public function firstStepSubmit()
    {

        $this->validate([
            'num_AO' => 'required|unique:aos,num_ao',
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

    public function submitForm(){
        try {
            $ao = new Ao();

            $ao->num_AO = $this->num_AO;
            $ao->date_limite = $this->date_limite;
            $ao->pays_id = $this->pays_id;
            $ao->type_id = $this->type_id;
            $ao->date_adjudication = $this->date_adjudication;
            $ao->ministere_id = $this->ministere_id;
            $ao->secteur_id = $this->secteur_id;
            $ao->partenariat = $this->partenariat;
            $ao->montant_soumission = $this->montant_soumission;
            $ao->budget = $this->budget;
            $ao->n_lot = $this->n_lot;
            $ao->client_id = $this->client_id;
            $ao->montant_c_p = $this->montant_c_p;
            $ao->critere_selection_id = $this->critere_selection_id;
            $ao->objet = $this->objet;


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
                $name_file = "rc." . $this->cps->extension();
                $this->cps->storeAs($path, $name_file);
                $ao->CPS = $path . $name_file;
            } else {
                $ao->CPS = '';
            }
            /**************************/


            /********partie_*******/

            //$ao->geom = (!empty($request->geom))?$request->geom : '';


            DB::transaction(function () use ($ao, $locations) {
                $ao->save();
                $ao->bus()->sync($this->select_partie_financiaire);
                $ao->departements()->sync($this->select_partie_administratif);
                $ao->utilisateurs()->sync($this->select_partie_technique);
                foreach($locations as $location){
                    //$stringoflocation = $location['stringofgeom'];
                    $ao->locations()->create([
                        'adresse'=>$location->adresse,
                        'location'=>$location->buildQuery(),
                    ]);
                }
            });
        } catch (Exception $e) {

        }
    }

    public function test(){
//        dd([$this->select_partie_financiaire, $this->select_partie_administratif, $this->select_partie_technique]);
        $this->secondStepSubmit();
    }

    public function get_select_partie_financiaire(){
        dd($this->select_partie_financiaire);
    }

    public function get_select_partie_administratif(){
        dd($this->select_partie_administratif);
    }

    public function get_select_partie_technique(){
        dd($this->select_partie_technique);
    }
}


