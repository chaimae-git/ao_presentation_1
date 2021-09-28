<?php

namespace App\Http\Livewire;

use App\Models\Piece_a_preparer;
use Livewire\Component;

class PieceAPreparerTechnique extends Component
{
    public $position = 'todo_list', $ao, $partie, $todoList=[],  $nom_fichier, $u_id, $u_nom_fichier, $saveTodoListBtn = 0, $update_nom_fichier = 0, $update_nom_fichier_id;
    protected $listeners = ['deletePieceAPreparerTechnique'];

    public function mount($partie, $ao){
        $this->partie = $partie;
        $this->ao = $ao;
    }

    public function openEditPiecesAPreparerModal($id){
        $piece = Piece_a_preparer::find($id);
        $this->u_nom_fichier = $piece->nom_fichier;
        $this->u_id = $piece->id;
        $this->dispatchBrowserEvent('openEditPiecesAPreparerModal');
    }

    public function editNomFichier($id){
        $this->update_nom_fichier = 1;
        $this->update_nom_fichier_id = $id;

        $this->u_nom_fichier = Piece_a_preparer::find($id)->nom_fichier;
    }

    public function updateNomFichier($id){
        $this->validate([
            'u_nom_fichier'=>'required',
        ]);

        $update = Piece_a_preparer::find($id)->update([
            'nom_fichier'=>$this->u_nom_fichier,
        ]);

        if($update){
            $this->update_nom_fichier = 0;
            $this->update_nom_fichier_id = null;
            $this->dispatchBrowserEvent('closeEditPiecesAPreparerTechniqueModal');
        }
    }

    public function ignoreUpdateNomFichier(){
        $this->update_nom_fichier = 0;
        $this->update_nom_fichier_id = null;
    }

    public function openAddPiecesAPreparerModal(){
        $this->dispatchBrowserEvent('openAddPiecesAPreparerModal');
    }

    public function showSaveTodoListButton(){
        $this->saveTodoListBtn = 1;
    }

    public function hideSaveTodoListButton(){
        $this->saveTodoListBtn = 0;
    }

    public function modifierPosition($position){
        $this->nom_fichier = '';
        $this->position = $position;
    }

    public function saveSettings(){
        $this->validate([
            'nom_fichier'=>'required',
        ]);

        $save = Piece_a_preparer::insert([
            'ao_id'=>$this->ao,
            'partie_id'=>$this->partie,
            'nom_fichier'=>$this->nom_fichier,
        ]);

        if($save){
            $this->dispatchBrowserEvent('closeAddPiecesAPreparerTechniqueModal');
        }

    }

    public function saveTodoList(){
        $pieces = Piece_a_preparer::where('ao_id', $this->ao)->where('partie_id', $this->partie)->get();
        foreach($pieces as $piece){
            if(in_array($piece->id, $this->todoList)) $piece->update(['selected'=>1]);
            else $piece->update(['selected'=>0]);
        }
        $this->hideSaveTodoListButton();
    }

    public function updateTodoList($id){
        $piece = Piece_a_preparer::find($id);
        //dd($this->todoList);
        if($piece->selected == 0){
            $piece->update(['selected'=>1]);
        }elseif($piece->selected == 1){
            $piece->update(['selected'=>0]);
        }
    }

    public function deleteConfirmPieceAPreparerTechnique($id){
        $piece = Piece_a_preparer::find($id);
        $this->dispatchBrowserEvent('swalConfirmPieceAPreparerTechnique', [
            'title'=>"Are You Sure",
            'html'=>"You Want To Delete This Piece a preparer",
            'id'=>$id,
        ]);
    }

    public function deletePieceAPreparerTechnique($id){
        $piece = Piece_a_preparer::findOrFail($id);
        //dd($piece);
        if($piece->delete()){
            $this->dispatchBrowserEvent('deletedPieceAPreparerTechnique');
        }
    }


    public function render()
    {
        $pieces_a_preparer = Piece_a_preparer::where('partie_id', $this->partie)->orderBy('nom_fichier')->where('ao_id',$this->ao)->get();
        return view('livewire.piece-a-preparer-technique', compact('pieces_a_preparer'));
    }
}
