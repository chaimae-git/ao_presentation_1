<?php

namespace App\Http\Livewire;

use App\Models\Bu;
use App\Models\Departement;
use Livewire\Component;

class Departements extends Component
{
    public $bu_id, $nom, $description;
    public $c_id, $u_bu_id, $u_nom, $u_description;


    public function openAddDepartementModal(){
        $this->dispatchBrowserEvent('openAddDepartementModal');
    }

    public function openEditDepartementModal(){
        $this->dispatchBrowserEvent('openEditDepartementModal');
    }

    public function save(){
        $this->validate([
            'bu_id'=>'required',
            'nom'=>'required|unique:departements,nom',
            'description'=>''
        ]);

        $save = Departement::insert([
            'bu_id'=>$this->bu_id,
            'nom'=>$this->nom,
            'description'=>$this->description
        ]);

        if($save){
            $this->dispatchBrowserEvent('closeAddDepartementModal');
        }

    }

    public function render()
    {
        $departements = Departement::all();
        $bus = Bu::all();
        return view('livewire.departements', compact('departements', 'bus'));
    }
}
