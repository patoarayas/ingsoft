<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicStoreRequest extends FormRequest
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
            'rut'=>'required|unique:academics,rut,cl_rut',
            'name'=>'required',
            'email' => 'required|email|unique:academics,email,'.$this->id,
            'email'=>'required|unique:academics,email',
            'email'=>'unique'
        ];


    }

    public function messages(){
        return [

            'rut.unique' => 'Ya existe el rut ingresado.',
            'name.required' => 'El campo Nombre no puede estar vacío',
            'rut.required' => 'El campo RUT no puede estar vacío',
            'email.required' => 'El campo E-mail no puede estar vacío',
            'email.unique' => 'El E-mail ya existe',
        ];
    }
}