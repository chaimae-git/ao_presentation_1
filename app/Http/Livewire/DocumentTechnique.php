<?php

namespace App\Http\Livewire;

use App\Models\Ao;
use App\Models\Fichier;
use App\Models\Partie;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentTechnique extends Component
{
    use WithFileUploads;

    public $ao, $partie,  $nom_fichier, $fichier, $description, $u_id, $u_nom_fichier, $u_fichier, $u_description;
    protected $listeners = ['deleteFichierTechnique'];

    public function mount($partie, $ao){
        $this->partie = $partie;
        $this->ao = $ao;
    }


    public function openAddDocumentTechniqueModal(){
        //dd($partie);
        //$this->getPartie();
        //$this->ao = null;
        $this->resetForm();
        //$this->partie = $this->getPartie();
        $this->dispatchBrowserEvent('openAddDocumentTechniqueModal', ['partie'=>$this->partie]);
    }

    public function resetForm(){
        $this->nom_fichier = null;
        $this->fichier = null;
        $this->description = null;
    }


    public function saveDocumentTechnique(){
        //dd($this->partie);
        $ao = Ao::find($this->ao);
        //dd($this);
        $this->validate([
            'nom_fichier'=>'required',
            'fichier'=>'required',
            'description'=>'',
        ]);

//        if(!empty($this->fichier) && is_file($this->fichier)){
        $partie = str_replace(' ', '_', Partie::find($this->partie)->partie);
        $path = 'public/aos/' . $ao->num_AO . '/'.$partie.'/';
        $name_file = str_replace(' ', '_', $this->nom_fichier).'.'.$this->fichier->extension();
        $this->fichier->storeAs($path, $name_file);
        $path_file = $path.$name_file;
        //dd($path_file);
//        }


        $save = Fichier::insert([
            'ao_id'=>$this->ao,
            'nom_fichier'=>$this->nom_fichier,
            'path'=>$path_file,
            'description'=>$this->description,
            'partie_id'=>$this->partie,
        ]);

        if($save){
            //$this->position = 'todo_list';
            $this->dispatchBrowserEvent('closeAddDocumentTechniqueModal');
        }

    }

    public function deleteConfirmFichierTechnique($id){
        $piece = Fichier::find($id);
        $this->dispatchBrowserEvent('swalConfirmFichierTechnique', [
            'title'=>"Are You Sure",
            'html'=>"You Want To Delete This Piece a preparer",
            'id'=>$id,
        ]);
    }

    public function deleteFichierTechnique($id){
        $del = Fichier::find($id);
        if(Storage::exists($del->path)){
            Storage::delete($del->path);
        }
        $delete = $del->delete();
        if($delete){
            $this->dispatchBrowserEvent('deletedFichierTechnique');
        }
    }

    public function render()
    {
        $fichiers = Fichier::orderBy('nom_fichier')->where('partie_id', $this->partie)->where('ao_id',$this->ao)->get();
        return view('livewire.document-technique', compact('fichiers'));
    }
}
