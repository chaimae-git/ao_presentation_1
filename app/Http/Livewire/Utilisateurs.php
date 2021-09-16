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
    public $c_id, $u_statut_id, $u_nom_prenom, $u_username, $u_password, $u_password_confirmation, $u_email, $u_image;


    public function openAddUtilisateurModal(){
        $this->dispatchBrowserEvent('openAddUtilisateurModal');
    }

    public function openEditUtilisateurModal(){
        $this->dispatchBrowserEvent('openEditUtilisateurModal');
    }

    public function save(){
        $this->validate([
            'nom_prenom'=>'required|unique:utilisateurs,nom_prenom',
            'email'=>'required|email|unique:utilisateurs,email',
            'username'=>'required|unique:utilisateurs,username',
            'password' => 'sometimes|confirmed|min:6|max:20',
            'statut_id'=> 'required|numeric',
            'image'=>'',

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

    public function render()
    {
        $utilisateurs = Utilisateur::all();
        $statuts = Statut::orderBy('statut')->get();
        //dd($statuts);
        return view('livewire.utilisateurs', compact('utilisateurs','statuts'));
    }
}
