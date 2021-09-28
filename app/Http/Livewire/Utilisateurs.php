<?php

namespace App\Http\Livewire;

use App\Models\Statut;
use App\Models\Utilisateur;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Utilisateurs extends Component
{
    use WithFileUploads;

    public $statut_id, $nom_prenom, $username, $password, $password_confirmation, $email, $image;
    public $u_id, $u_statut_id, $u_nom_prenom, $u_username, $u_password, $u_password_confirmation, $u_email, $u_image;

    protected $listeners = ['delete'];


    public function openAddUtilisateurModal(){
        $this->dispatchBrowserEvent('openAddUtilisateurModal');
    }

    public function openEditUtilisateurModal($id){
        $utilisateur = Utilisateur::find($id);
        $this->u_id = $utilisateur->id;
        $this->u_nom_prenom = $utilisateur->nom_prenom;
        $this->u_statut_id = $utilisateur->statut_id;
        $this->u_username = $utilisateur->username;
        $this->u_email = $utilisateur->email;
        $this->u_image = $utilisateur->image;
        $this->dispatchBrowserEvent('openEditUtilisateurModal');
    }

    public function save(){
        $this->validate([
            'nom_prenom'=>'required|unique:utilisateurs,nom_prenom',
            'email'=>'required|email|unique:utilisateurs,email',
            'username'=>'required|unique:utilisateurs,username',
            'password' => 'sometimes|confirmed|min:6|max:20',
            'statut_id'=> 'required|numeric',
            'image'=>'image',

        ]);

        //dd($this);

        if($this->image){
            $image_tmp = $this->image;
            if($image_tmp->isValid()){
                $extension = $image_tmp->extension();
                $img_name = $this->username.Carbon::now()->format('YmdHs').'.'.$extension;
                $user_folder_path = 'images/utilisateurs/'.$this->username;
                mkdir($user_folder_path);
                $imagePath = $user_folder_path.'/'.$img_name;
                Image::make($image_tmp)->resize(300, 200)->save($imagePath);
                $image_name = $img_name;
            }
        }else{
            $image_name = '';
        }

        $save = Utilisateur::insert([
            'statut_id' => $this->statut_id,
            'nom_prenom' => $this->nom_prenom,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'email' => $this->email,
            'image'=>$image_name
        ]);

        if($save){
            $this->dispatchBrowserEvent('closeAddUtilisateurModal');
        }

    }

    public function update(){

        //dd($this);
        $this->validate([
            'u_nom_prenom'=>'required|unique:utilisateurs,nom_prenom,'.$this->u_id,
            'u_email'=>'required|email|unique:utilisateurs,email,'.$this->u_id,
            'u_username'=>'required|unique:utilisateurs,username,'.$this->u_id,
            'u_password' => 'sometimes|confirmed|min:6|max:20',
            'u_statut_id'=> 'required|numeric',
            'u_image'=>'',

        ]);

        //dd($this);

        if($this->u_image){
            $image_tmp = $this->u_image;
            if(is_file($image_tmp)){
                $extension = $image_tmp->extension();
                $img_name = $this->u_username.Carbon::now()->format('YmdHs').'.'.$extension;
                $user_folder_path = 'images/utilisateurs/'.$this->u_username;
                if(!is_dir($user_folder_path)) mkdir($user_folder_path);
                $imagePath = $user_folder_path.'/'.$img_name;
                Image::make($image_tmp)->resize(300, 200)->save($imagePath);
                $image_name = $img_name;
            }else{
                $image_name = Utilisateur::find($this->u_id)->image;
            }
        }

        $update = Utilisateur::find($this->u_id)->update([
            'statut_id' => $this->u_statut_id,
            'nom_prenom' => $this->u_nom_prenom,
            'username' => $this->u_username,
            'password' => Hash::make($this->u_password),
            'email' => $this->u_email,
            'image'=>$image_name
        ]);

        if($update){
            $this->dispatchBrowserEvent('closeEditUtilisateurModal');
        }
    }

    public function deleteConfirm($id){
        $this->dispatchBrowserEvent('swalConfirm', [
            'title'=>"Are You Sure",
            'html'=>"You Want To Delete This Utilisateur",
            'id'=>$id,
        ]);
    }

    public function delete($id){
        $del = Utilisateur::find($id)->delete();
        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
    }

    public function render()
    {
        $utilisateurs = Utilisateur::all();
        $statuts = Statut::orderBy('statut')->get();
        //dd($statuts);
        return view('livewire.utilisateurs', compact('utilisateurs','statuts'));
    }
}
