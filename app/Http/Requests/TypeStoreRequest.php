<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeStoreRequest extends FormRequest
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
        return [
            'activity_name' =>'required|unique:types,activity_name',
            'max_students'=>'required',
            'duration'=>'required',
            'req_external_org'=>'required',
        ];
    }

    public function messages(){
        return [
            'activity_name.required' => 'El campo nombre no puede estar vacio',
            'activity_name.unique' => 'Ya existe un tipo de actividad con ese nombre.'
        ];
    }
}
