<?php namespace App\Repositories\Frontend\User;

use App\User;
use App\UserProvider;
use App\Exceptions\GeneralException;
use App\Repositories\Backend\Role\RoleRepositoryContract;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentUserRepository implements UserContract {

	/**
	 * @var RoleRepositoryContract
	 */
	protected $role;

	/**
	 * @param RoleRepositoryContract $role
	 */
	public function __construct(RoleRepositoryContract $role) {
		$this->role = $role;
	}

	/**
	 * @param $id
	 * @return \Illuminate\Support\Collection|null|static
	 * @throws GeneralException
	 */
	public function findOrThrowException($id) {
		$user = User::find($id);
		if (! is_null($user)) return $user;
		throw new GeneralException('Cet utilisateur n\'existe pas.');
	}

	/**
	 * @param $data
	 * @param bool $provider
	 * @return static
	 */
	public function create($data, $provider = false) {
		$user = User::create([
			'username' => $data['username'],
			'email' => $data['email'],
			'last_name' => $data['last_name'],
			'first_name' => $data['first_name'],
			'tel' => $data['tel'],
			'password' => $provider ? null : $data['password'],
			'confirmation_code' => md5(uniqid(mt_rand(), true)),
			'confirmed' => config('access.users.confirm_email') ? 0 : 1,
		]);
		$user->attachRole($this->role->getDefaultUserRole());

		if (config('access.users.confirm_email'))
			$this->sendConfirmationEmail($user);

		return $user;
	}

	/**
	 * @param $data
	 * @param $provider
	 * @return static
	 */
	public function findByUserNameOrCreate($data, $provider) {
		$user = User::where('email', $data->email)->first();
		$providerData = [
			'avatar' => $data->avatar,
			'provider' => $provider,
			'provider_id' => $data->id,
		];

		if(! $user) {
			$user = $this->create([
				'username' => $data->username,
				'email' => $data->email,
			], true);
		}

		if ($this->hasProvider($user, $provider))
			$this->checkIfUserNeedsUpdating($provider, $data, $user);
		else
		{
			$user->providers()->save(new UserProvider($providerData));
		}

		return $user;
	}

	/**
	 * @param $user
	 * @param $provider
	 * @return bool
	 */
	public function hasProvider($user, $provider) {
		foreach ($user->providers as $p) {
			if ($p->provider == $provider)
				return true;
		}

		return false;
	}

	/**
	 * @param $provider
	 * @param $providerData
	 * @param $user
	 */
	public function checkIfUserNeedsUpdating($provider, $providerData, $user) {
		//Have to first check to see if username and email have to be updated
		$userData = [
			'email' => $providerData->email,
			'username' => $providerData->username,
		];
		$dbData = [
			'email' => $user->email,
			'username' => $user->username,
		];
		$differences = array_diff($userData, $dbData);
		if (! empty($differences)) {
			$user->email = $providerData->email;
			$user->username = $providerData->username;
			$user->save();
		}

		//Then have to check to see if avatar for specific provider has changed
		$p = $user->providers()->where('provider', $provider)->first();
		if ($p->avatar != $providerData->avatar) {
			$p->avatar = $providerData->avatar;
			$p->save();
		}
	}

	/**
	 * @param $id
	 * @param $input
	 * @return mixed
	 * @throws GeneralException
	 */
	public function updateProfil($id, $input) {
		$user = $this->findOrThrowException($id);
		$user->username = $input['username'];
		$user->last_name = $input['last_name'];
		$user->first_name = $input['first_name'];
		$user->gender = $input['gender'];
		$user->birthday = $input['birthday'];
		$user->tel = $input['tel'];
		$user->province = $input['province'];
		$user->city = $input['city'];
		$user->address = $input['address'];

		if ($user->canChangeEmail()) {
			//Address is not current address
			if ($user->email != $input['email'])
			{
				//Emails have to be unique
				if (User::where('email', $input['email'])->first())
					throw new GeneralException("cet e-mail adresse est déjà pris.");

				$user->email = $input['email'];
			}
		}

		return $user->save();
	}

	/**
	 * @param $input
	 * @return mixed
	 * @throws GeneralException
	 */
	public function changePassword($input) {
		$user = $this->findOrThrowException(auth()->id());

		if (Hash::check($input['old_password'], $user->password)) {
			//Passwords are hashed on the model
			$user->password = $input['password'];
			return $user->save();
		}

		throw new GeneralException("Ce n'est pas votre mot de passe actuel.");
	}

	/**
	 * @param $token
	 * @throws GeneralException
	 */
	public function confirmAccount($token) {
		$user = User::where('confirmation_code', $token)->first();

		if ($user) {
			if ($user->confirmed == 1)
				throw new GeneralException("Votre compte est déjà confirmé.");

			if ($user->confirmation_code == $token) {
				$user->confirmed = 1;
				return $user->save();
			}

			throw new GeneralException("Votre code de confirmation n'est pas mentionné.");
		}

		throw new GeneralException("Ce code de confirmation n'existe pas.");
	}

	/**
	 * @param $user
	 * @return mixed
	 */
	public function sendConfirmationEmail($user) {
		//$user can be user instance or id
		if (! $user instanceof User)
			$user = User::findOrFail($user);

		return Mail::send('emails.confirm', ['token' => $user->confirmation_code], function($message) use ($user)
		{
			$message->to($user->email, $user->username)->subject(app_name().': Confirmez votre compte !');
		});
	}
}