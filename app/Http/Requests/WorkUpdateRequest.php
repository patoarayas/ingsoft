<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkUpdateRequest extends FormRequest
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
        'title'=>'required',
        'status'=>'required',
        'start_date'=>'required',
        'finish_date'=>'required',
        'name_ext_org',
        'tutor_ext_org',
        'cant_students'=>'required',
        'year_reg'=>'required',
        'semester_reg'=>'required',
        'graduation_date'=>'nullable',
        'grade'=>'nullable',
        'curricular_code'=>'nullable'
        ];
    }
}
