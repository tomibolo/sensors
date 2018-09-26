<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SensorMassiveRequest extends FormRequest
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
            'data' => 'required|array|min:1',
            'data.*.master_id' => 'required|string',
            'data.*.sensornode_id' => 'required|integer',
            'data.*.contactsensor_state' => 'required|string',
            'data.*.battery_voltage' => 'required|numeric',
        ];
    }
}
