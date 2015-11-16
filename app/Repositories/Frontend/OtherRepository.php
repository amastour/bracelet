<?php namespace App\Repositories\Frontend;


use App\Other;
use App\Profile;
use Auth;

class OtherRepository {

    protected $other;

    public function __construct(Other $other)
	{
		$this->other = $other;
	}


	public function store($inputs)
	{	
		
		$profile = Profile::find($inputs['profile_id']);

		$other = new Other;
		$other->label = $inputs['label'];
		$other->notes = $inputs['notes'];
        $profile->others()->save($other);
        $other->save();
	

	}
	public function update($inputs,$id)
	{	
		
		$other=Other::find($id);
		$other->update($inputs);
	
	}

	

	public function destroy($id)
	{
		$other = $this->other->findOrFail($id);
		$other->delete();
	}

}