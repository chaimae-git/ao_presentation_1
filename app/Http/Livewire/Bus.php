<?php

namespace App\Http\Livewire;

use App\Models\Bu;
use Livewire\Component;
use Livewire\WithPagination;

class Bus extends Component
{
    public $nom, $description;
    public $u_id, $u_nom, $u_description;

    protected $listeners = ['delete'];

    protected $paginationTheme = 'bootstrap';


    public function openAddBuModal(){
        $this->dispatchBrowserEvent('openAddBuModal');
    }

    public function openEditBuModal($id){
        $bu = Bu::find($id);
        $this->u_nom = $bu->nom;
        $this->u_description = $bu->description;
        $this->u_id = $bu->id;
        $this->dispatchBrowserEvent('openEditBuModal');
    }

    public function save(){
        //dd($this);
        $this->validate([
            'nom'=>'required|unique:bus,nom',
            'description'=>''
        ]);

        $save = Bu::insert([
            'nom'=>$this->nom,
            'description'=>$this->description
        ]);

        if($save){
            $this->dispatchBrowserEvent('closeAddBuModal');
        }

    }

    public function update(){
        $this->validate([
            'u_nom'=>'required|unique:bus,nom,'.$this->u_id,
            'u_description'=>''
        ]);

        $update = Bu::find($this->u_id)->update([
            'nom'=>$this->u_nom,
            'description'=>$this->u_description
        ]);

        if($update){
            $this->dispatchBrowserEvent('closeEditBuModal');
        }
    }

    public function deleteConfirm($id){
        $bu = Bu::find($id);
        $this->dispatchBrowserEvent('swalConfirm', [
            'title'=>"Are You Sure",
            'html'=>"You Want To Delete This Bu",
            'id'=>$id,
        ]);
    }

    public function delete($id){
        $del = Bu::find($id)->delete();
        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
    }

    public function render()
    {
        $bus = Bu::all();
        return view('livewire.bus', compact('bus'));
    }
}
