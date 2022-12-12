<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElectricityRequest extends FormRequest
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
            'customer_info' => 'required',
            'time' => 'required',
            'current_read' => 'required',
            'current_date' => 'required',
            'account' => 'required',
            'previous_read' => 'required',
            'previous_date' => 'required',
            'meter_no' => 'requried',
            'unit' => 'required',
            'issue_date' => 'required',
            'last_date' => 'required',
            'current_price' => 'required',
            'service_charged' => 'required',
            'electricity_tax' => 'required',
            'demand_charge' => 'required',
            'electricity_vat' => 'required',
           
            'd_fromdate' => 'required',
            'd_todate' => 'required',
            'due_balance' => 'required',
            'surcharge' => 'required',
         
        ];
    }
}
