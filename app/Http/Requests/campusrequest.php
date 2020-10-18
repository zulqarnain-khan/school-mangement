<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class campusrequest extends FormRequest
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
            'schoolname' => 'required|max:255',
            'schooladdress' => 'required|max:255',
            'phoneno' => 'required|max:255',
            'city' =>   'required|max:255',
            'instuition'=> 'required|max:255',
            'status'=>  'required|max:10',
            'smsstatus'=>  'required|max:10',
            'billingcharges' => 'required|max:255',
            'discount' => 'required|max:255',
            'billingdate' => 'required|max:255',
            'schoollogo'=>'mimes:jpeg,jpg,png,gif|max:10000',
            'schoolemail' => 'required|email:strict,dns,filter'
        ];
    }
}
