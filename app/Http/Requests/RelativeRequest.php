<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RelativeRequest extends Request
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
            'last_name'      => 'required|alpha|max:15',
            'first_name'      => 'required|alpha|max:15',
            'relationship' => 'required|string|max:15',
            'location_geo' => 'string|max:45',
            'tel_home' => 'digits:10',
            'tel_mobile' => 'required|digits:10',

        ];
    }
}
