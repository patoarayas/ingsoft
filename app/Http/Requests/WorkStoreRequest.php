<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkStoreRequest extends FormRequest
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
        ['title'=>'required',
        'status'=>'default',
        'start_date'=>'required',
        'finish_date'=>'required',
        'name_ext_org'=>'nullable',
        'tutor_ext_org'=>'nullable',
        'cant_students'=>'nullable',
        'year_reg'=>'nullable',
        'semester_reg'=>'nullable',
        'graduation_date'=>'nullable',
        'grade'=>'nullable',
        'curricular_code'=>'nullable',
        ];
    }
}
