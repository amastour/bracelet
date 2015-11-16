<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\User\UserContract;
use App\Http\Requests\Frontend\User\UpdateProfilRequest;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Frontend
 */
class ProfilController extends Controller {

	/**
	 * @param $id
	 * @return mixed
	 */
	public function edit($id) {
		return view('frontend.user.profil.edit')
			->withUser(auth()->user($id));
	}

	/**
	 * @param $id
	 * @param UserContract $user
	 * @param UpdateProfileRequest $request
	 * @return mixed
	 */
	public function update($id, UserContract $user, UpdateProfilRequest $request) {
		$user->updateProfil($id, $request->only('username','last_name','first_name','gender','birthday','tel','province','city','address'));
		$info="Vos informations ont été mises à jour avec succès.";
		return view('frontend.user.profil.edit',compact('info'))->withUser(auth()->user($id));
	}
}