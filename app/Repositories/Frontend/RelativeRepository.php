<?php namespace App\Repositories\Frontend;


use App\Relative;
use App\Profile;
use Auth;

class RelativeRepository {

    protected $relative;

    public function __construct(Relative $relative)
	{
		$this->relative = $relative;
	}


	public function store($inputs)
	{	
		$profile = Profile::find($inputs['profile_id']);

		$relative = new Relative;
		$relative->last_name = $inputs['last_name'];
		$relative->first_name = $inputs['first_name'];
		$relative->tel_mobile = $inputs['tel_mobile'];
		$relative->tel_home = $inputs['tel_home'];
		$relative->relationship = $inputs['relationship'];
		$relative->location_geo = $inputs['location_geo'];
        $profile->relatives()->save($relative);
        $relative->save();

	}
	public function update($inputs,$id)
	{	
		
		$relative=Relative::find($id);
		$relative->update($inputs);
	
	}

	

	public function destroy($id)
	{
		$relative = $this->relative->findOrFail($id);
		$relative->delete();
	}

}