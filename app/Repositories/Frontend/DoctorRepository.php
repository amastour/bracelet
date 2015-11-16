<?php namespace App\Repositories\Frontend;


use App\Doctor;
use App\Profile;
use Auth;

class DoctorRepository {

    protected $doctor;

    public function __construct(Doctor $doctor)
	{
		$this->doctor = $doctor;
	}


	public function store($inputs)
	{	
		
		$profile = Profile::find($inputs['profile_id']);

		$doctor = new Doctor;
		$doctor->name = $inputs['name'];
		$doctor->tel = $inputs['tel'];
		$doctor->city = $inputs['city'];
		$doctor->specialty = $inputs['specialty'];
		$doctor->address = $inputs['address'];
		$doctor->location_geo = $inputs['location_geo'];
        $profile->doctors()->save($doctor);
        $doctor->save();

	}
	public function update($inputs,$id)
	{	
		
		$doctor=Doctor::find($id);
		$doctor->update($inputs);
	
	}

	

	public function destroy($id)
	{
		$doctor = $this->doctor->findOrFail($id);
		$doctor->delete();
	}

}