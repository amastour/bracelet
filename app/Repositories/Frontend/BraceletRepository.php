<?php namespace App\Repositories\Frontend;

use App\Bracelet;
use App\Profile;
use Auth;

class BraceletRepository {

    protected $bracelet;

    public function __construct(Bracelet $bracelet)
	{
		$this->bracelet = $bracelet;
	}


	public function store($inputs)
	{	
		//
	}
	
	public function update($inputs,$id)
	{	
		//
	
	}

	

	public function destroy($id)
	{
		//
	}

}