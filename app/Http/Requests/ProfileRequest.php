<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileRequest extends Request
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
            'gender' => 'required',
            'birthday' => 'required',
            'size' => 'digits_between:1,5',
            'weight' => 'digits_between:1,5', 
            'color_eye' => 'required',
            'color_hair' => 'required',
            'tel_home' => 'digits:10',
            'tel_mobile' => 'digits:10',
            'address' => 'string|max:1000',
            'city' => 'required|string|max:15',
            'province' => 'string|max:20',
            'fonction' => 'string|max:15',
            'img'=>'image|mimes:jpeg,jpg,png,bmp,gif,svg',
        ];
    }
}
