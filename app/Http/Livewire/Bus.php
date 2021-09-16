<?php

namespace App\Http\Livewire;

use App\Models\Bu;
use Livewire\Component;
use Livewire\WithPagination;

class Bus extends Component
{
    public $nom, $description;
    public $c_id, $u_nom, $u_description;

    protected $paginationTheme = 'bootstrap';


    public function openAddBuModal(){
        $this->dispatchBrowserEvent('openAddBuModal');
    }

    public function openEditBuModal(){
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

    public function render()
    {
        $bus = Bu::all();
        return view('livewire.bus', compact('bus'));
    }
}
