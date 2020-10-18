<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'EMP_NAME'=>'required|max:255',
            'FATHER_NAME'=>'required|max:255',
            'DESIGNATION_ID'=>'required',
            'QUALIFICATION' =>'required',
            'EMP_TYPE'=>'required',
            'ADDRESS'=>'required',
            'PASSWORD'=>'required',
            'EMP_IMAGE'=>'mimes:jpeg,jpg,png,gif|max:10000',
            'JOINING_DATE'=>'required',
        ];
    }
}
