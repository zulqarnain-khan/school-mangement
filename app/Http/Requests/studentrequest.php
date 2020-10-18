<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentrequest extends FormRequest
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
            'NAME'=>'required|max:255',
            'FATHER_NAME'=>'required|max:255',
            'PRESENT_ADDRESS'=>'required',
            'PERMANENT_ADDRESS' =>'required',
            'GUARDIAN'=>'required',
            'SLC_NO'=>'required',
            'PASSING_YEAR'=>'required',
            'IMAGE'=>'mimes:jpeg,jpg,png,gif|max:10000',
            'SESSION_ID'=>'required',
            'CLASS_ID'=>'required',
            'SECTION_ID'=>'required',
        ];
    }
    public function messages()
{
    return [
        'NAME.required' => 'A Name is required',
        'FATHER_NAME.required'  => 'A father name is required',
    ];
}
}
