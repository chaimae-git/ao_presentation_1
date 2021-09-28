<?php

namespace App\Http\Livewire;

use App\Models\Bu;
use App\Models\Departement;
use Livewire\Component;

class Departements extends Component
{
    public $bu_id, $nom, $description;
    public $u_id, $u_bu_id, $u_nom, $u_description;

    protected $listeners = ['delete'];


    public function openAddDepartementModal(){
        $this->dispatchBrowserEvent('openAddDepartementModal');
    }

    public function openEditDepartementModal($id){
        $departement = Departement::find($id);
        $this->u_id = $departement->id;
        $this->u_bu_id = $departement->bu_id;
        $this->u_nom = $departement->nom;
        $this->u_description = $departement->description;
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

    public function update(){
        $this->validate([
            'u_bu_id'=>'required',
            'u_nom'=>'required|unique:departements,nom,'.$this->u_id,
            'u_description'=>''
        ]);

        $update = Departement::find($this->u_id)->update([
            'bu_id'=>$this->u_bu_id,
            'nom'=>$this->u_nom,
            'description'=>$this->u_description
        ]);

        if($update){
            $this->dispatchBrowserEvent('closeEditDepartementModal');
        }
    }

    public function deleteConfirm($id){
        $this->dispatchBrowserEvent('swalConfirm', [
            'title'=>"Are You Sure",
            'html'=>"You Want To Delete This Departement",
            'id'=>$id,
        ]);
    }

    public function delete($id){
        $del = Departement::find($id)->delete();
        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
    }

    public function render()
    {
        $departements = Departement::all();
        $bus = Bu::all();
        return view('livewire.departements', compact('departements', 'bus'));
    }
}
