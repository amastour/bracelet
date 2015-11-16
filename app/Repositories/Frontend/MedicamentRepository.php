<?php namespace App\Repositories\Frontend;


use App\Medicament;
use App\Profile;
use Auth;

class MedicamentRepository {

    protected $medicament;

    public function __construct(Medicament $medicament)
	{
		$this->medicament = $medicament;
	}


	public function store($inputs)
	{	
		
		$profile = Profile::find($inputs['profile_id']);

		$medicament = new Medicament;
		$medicament->name = $inputs['name'];
		$medicament->notes = $inputs['notes'];
        $profile->medicaments()->save($medicament);
        $medicament->save();
	
		

	}
	public function update($inputs,$id)
	{	
		
		$medicament=Medicament::find($id);
		$medicament->update($inputs);
	
	}

	

	public function destroy($id)
	{
		$medicament = $this->medicament->findOrFail($id);
		$medicament->delete();
	}

}