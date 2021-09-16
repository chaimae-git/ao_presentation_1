<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->id != null){
            $array = ['nom_prenom'=>'required|unique:utilisateurs,nom_prenom,'.$this->id,
                        'email'=>'required|email|unique:utilisateurs,email,'.$this->id,
                        'username'=>'required|unique:utilisateurs,username,'.$this->id,
                        'password' => 'sometimes|confirmed|min:6|max:20',
                     ];
        }else{
            $array = ['nom_prenom'=>'required|unique:utilisateurs,nom_prenom',
                        'email'=>'required|email|unique:utilisateurs,email',
                        'username'=>'required|unique:utilisateurs,username',
                        'password' => 'required|confirmed|min:6|max:20',
                     ];
        }
        $array += [
            'statut_id'=> 'required|numeric',
            'image'=>''
        ];

        return $array;
    }
}
