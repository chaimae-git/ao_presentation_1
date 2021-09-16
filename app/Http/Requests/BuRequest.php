<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use function PHPUnit\Framework\isNull;

class BuRequest extends FormRequest
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
            $array['nom']='required|unique:bus,nom,'.$this->id;
        }else{
            $array['nom']='required|unique:bus,nom';
        }
        $array['description'] = '';
        return $array;
    }
}
