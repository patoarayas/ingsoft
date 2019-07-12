<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'rut'=>'required|students,rut,cl_rut',
            'name'=>'required',
            'email'=>'required|unique:students,email',
            'phone'=>'nullable',
            'career'=>'nullable',
            'work_id'=>'nullable'];


    }

    public function messages(){
        return [

            'rut.unique' => 'Ya existe el rut ingresado.',
            'career.required'=>'El campo Carrera no puede estar vacío',
            'name.required' => 'El campo Nombre no puede estar vacío',
            'rut.required' => 'El campo RUT no puede estar vacío',
            'email.required' => 'El campo E-mail no puede estar vacío',
            'email.unique' => 'El E-mail ya existe',
        ];
    }
}
