<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WaterRequest extends FormRequest
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
            //
            'building' => 'required',
            'tenants' => 'required',
            'c_fromdate' => 'required',
            'c_todate' => 'required',
            'c_measurement' => 'required',
            'c_totalmonth' => 'required',
            'c_rate' => 'required',
            'd_fromdate' => 'required',
            'd_todate' => 'required',
            'd_measurement' => 'required',
            'd_totalmonth' => 'required',
            'd_rate' => 'required',
            'vat' => 'required'
        ];
    }
}
