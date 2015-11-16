<?php namespace App\Http\Requests\Frontend\User;

use App\Http\Requests\Request;

class UpdateProfilRequest extends Request {

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
			'username' 		=> 'required|alpha|max:255',
			'email'	=> 'sometimes|required|email',
			'last_name' => 'required|alpha|max:255',
			'first_name' => 'required|alpha|max:255',
			'tel' => 'required|digits:10',
			'province' => 'string|max:20',
			'city' => 'string|max:10',
			'address' => 'string|max:1000',
		];
	}
}