<?php namespace App\Repositories\Frontend;


use App\Disease;
use App\Profile;
use Auth;

class DiseaseRepository {

    protected $disease;

    public function __construct(Disease $disease)
	{
		$this->disease = $disease;
	}


	public function store($inputs)
	{	
		$profile = Profile::find($inputs['profile_id']);

		$disease = new Disease;
		$disease->name = $inputs['name'];
		$disease->level = $inputs['level'];
		$disease->notes = $inputs['notes'];
		$disease->prohibitions = $inputs['prohibitions'];
        $profile->diseases()->save($disease);
        $disease->save();
	}
	
	public function update($inputs,$id)
	{	
		$disease=Disease::find($id);
		$disease->update($inputs);
	}

	

	public function destroy($id)
	{
		$disease = $this->disease->findOrFail($id);
		$disease->delete();
	}

}