<?php namespace App\Repositories\Frontend;


use App\Operation;
use App\Profile;
use Auth;

class OperationRepository {

    protected $operation;

    public function __construct(Operation $operation)
	{
		$this->operation = $operation;
	}


	public function store($inputs)
	{	
		$profile = Profile::find($inputs['profile_id']);
		
		$operation = new Operation;
		$operation->name = $inputs['name'];
		$operation->op_date = $inputs['op_date'];
		$operation->notes = $inputs['notes'];
        $profile->operations()->save($operation);
        $operation->save();

	}
	public function update($inputs,$id)
	{	
		
		$operation=Operation::find($id);
		$operation->update($inputs);
	
	}

	

	public function destroy($id)
	{
		$operation = $this->operation->findOrFail($id);
		$operation->delete();
	}

}