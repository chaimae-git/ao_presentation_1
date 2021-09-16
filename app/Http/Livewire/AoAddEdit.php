<?php

namespace App\Http\Livewire;

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
use Livewire\Component;
use Livewire\WithFileUploads;

class AoAddEdit extends Component
{
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
        $adresse, $name, $location, $nom_location;


    public function test(){
        dd("test");
    }

    public function render()
    {
        //dd($this->select_partie_administratif);
        $data = [
//            'bus' => Bu::orderBy('nom')->get(),
//            'departements' => Departement::orderBy('nom')->get(),
//            'secteur_activites' => Secteur_activite::orderBy('secteur')->get(),
//            'pays' => Pays::orderBy('pays')->get(),
//            'ministere_tuelles' => ministere_de_tuelle::orderBy('ministere')->get(),
//            'criteres_selections' => Critere_selection::orderBy('critere')->get(),
//            'types' => Type::orderBy('type')->get(),
//            'clients' => Client::orderBy('client')->get(),
//            'secretaires' => Statut::with('utilisateurs')->join('utilisateurs', 'statuts.id', '=', 'utilisateurs.statut_id')->where('statuts.statut', 'secretaire')->orderBy('utilisateurs.nom_prenom')->get(),
        ];
        return view('livewire.ao-add-edit'/* , $data*/);
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
            $ao->cps = $this->cps;
            $ao->rc = $this->rc;


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

            $ao->adresse = (!empty($this->adresse)) ? $this->adresse : '';
            //$ao->geom = (!empty($request->geom))?$request->geom : '';


            DB::transaction(function () use ($ao) {
                $ao->save();
                $ao->bus()->sync($this->bus_ids);
                $ao->departements()->sync($this->departements_ids);
                $ao->utilisateurs()->sync($this->utilisateurs_ids);
                $ao->locations()->insert([
                    'nom' => $this->nom_location,
                    'location' => $this->location,
                ]);
            });
        } catch (Exception $e) {

        }
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


    //firstStepSubmit
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;

    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;

    }

    public function submitForm_edit(){

        if ($this->Parent_id){
            $parent = My_Parent::find($this->Parent_id);
            $parent->update([
                'Passport_ID_Father' => $this->Passport_ID_Father,
                'National_ID_Father' => $this->National_ID_Father,
            ]);

        }

        return redirect()->to('/add_parent');
    }

    //clearForm
    public function clearForm()
    {
        $this->num_AO = '';
        $this->date_limite = '';
        $this->pays_id = '';
        $this->type_id = '';
        $this->date_adjudication = '';
        $this->ministere_id = '';
        $this->secteur_id ='';
        $this->partenariat = '';
        $this->montant_soumission = '';
        $this->budget = '';
        $this->n_lot = '';
        $this->client_id ='';
        $this->montant_c_p ='';

        $this->critere_selection_id = '';
        $this->objet = '';
        $this->cps = '';
        $this->rc = '';

    }


    //back
    public function back($step)
    {
        dd("hello");
        $this->currentStep = $step;
    }
}
