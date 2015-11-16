<?php namespace App\Repositories\Frontend;

use App\User;
use App\Profile;
use App\Invitation;
use Auth;

class InvitationRepository {

    protected $invitation;

    public function __construct(Invitation $invitation)
	{
		$this->invitation = $invitation;
	}


	public function store($inputs,$id)
	{	
		$guest = User::where('email', '=', $inputs['email'])->first();
        $user=Auth::user();
        $profile=Profile::find($id);
        $inputs['id_profile']=$id;
        $inputs['name_profile']=$profile->name();
        $inputs['id_from']=$user->id;
        $inputs['email_from']=$user->email;
        $inputs['id_to']=$guest->id;
        $inputs['email_to']=$guest->email;



		$invitation=$this->invitation->create($inputs);
		//$invitation->users()->attach($user->id);

		

	}
	
	
	public function accept($id)
	{
	 	// Accepter invitation
	 	$invitation=Invitation::find($id);
        $invitation->confirm=1;
        $invitation->update();
        
        // Attacher le profil à l'invitant       
        $profile=Profile::find($invitation->id_profile);
        $profile->users()->attach($invitation->id_to);
	}
	
	
	
	public function update($inputs,$id)
	{	
		
		//
	
	}
	
	public function edit($id)
    {
        //
    }
	
	public function refuse($id)
	{
		// Refuser Invitation
		$invitation=Invitation::find($id);
        $invitation->confirm=2;
        $invitation->update();

	}
	

	public function destroy($id)
	{
		// Annuler Invitation
        $invitation=Invitation::find($id);
		$invitation->delete();

	}

}