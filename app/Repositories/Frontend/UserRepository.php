<?php namespace App\Repositories\Frontend;

use App\User;


class UserRepository {

    protected $user;

    public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function getPaginate($n)
	{
		return $this->user->with('profiles')
		->orderBy('users.created_at', 'desc')
		->paginate($n);
	}

	public function store($inputs)
	{
		//
	}

	public function destroy($id)
	{
		$user = $this->user->findOrFail($id);
		$user->profiles()->detach();
		$user->status='2';
		$user->update();
		$user->Delete();
	}

}