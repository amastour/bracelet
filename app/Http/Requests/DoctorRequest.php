<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DoctorRequest extends Request
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
            'name'      => 'required|alpha|max:15',
            'specialty' => 'required|string|max:20',
            'city' => 'string|max:15',
            'tel' => 'digits:10',
            'address' => 'string|max:1000',
            'location_geo' => 'string|max:45',

        ];
    }
}
