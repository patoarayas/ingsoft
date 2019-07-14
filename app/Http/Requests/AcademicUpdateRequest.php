<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicUpdateRequest extends FormRequest
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
        return
        [
            'rut'=>'required:academics,rut,cl_rut'.$this->academic,
            'name'=>'required',
            'email'=>'required',
        ];
            
        
    }

    public function messages(){
        return [
            'name.required' => 'El campo nombre no puede estar vacío',
            'rut.required' => 'El campo RUT no puede estar vacío',
            'email.required' => 'El campo E-mail no puede estar vacío',
        ];
    }
}