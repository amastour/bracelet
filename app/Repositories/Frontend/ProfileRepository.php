<?php namespace App\Repositories\Frontend;
require '../vendor/autoload.php';

use Intervention\Image\ImageManager;
use DateTime;
use App\Profile;
use Auth;

class ProfileRepository {

    protected $profile;

    public function __construct(Profile $profile)
	{
		$this->profile = $profile;
	}

	public function getPaginate($n)
	{
		return $this->profile->with('users')
		->orderBy('profiles.created_at', 'desc')
		->paginate($n);
	}

	public function store($inputs)
	{	
		$img=$inputs['img'];       
		unset($inputs['img']);
		
		// Create profile
		$user=Auth::user();
		$profile=$this->profile->create($inputs);
		$profile->users()->attach($user->id);
		
		//  Uploading an image
		if(count($img)!=0)
		{
		$now = new DateTime();
		$year=$now->format('Y');
		$month=$now->format('m');
		$day=$now->format('d');
		$imgName = date('His')."_".$profile->id . "." . $img->getClientOriginalExtension();
	 	$img->move(base_path() . '/public/uploads/'.$year.'/'.$month.'/'.$day, $imgName
    	);
    	$profile->img = "/public/uploads/".$year."/".$month."/".$day."/".$imgName ;
        $profile->save();
		}
	

	}
	public function update($inputs,$id)
	{	
		$profile=Profile::find($id);
		// uploading image
		$img=$inputs['img'];
		if(count($img)!=0)
		{
		$now = new DateTime();
		$year=$now->format('Y');
		$month=$now->format('m');
		$day=$now->format('d');
		$imgName = date('His')."_".$profile->id . "." . $img->getClientOriginalExtension();
		// create an image manager instance with favored driver
		$manager = new ImageManager(array('driver' => 'imagick'));
		
		// to finally create image instances
	 	$img->move(base_path() . '/public/uploads/'.$year.'/'.$month.'/'.$day, $imgName
    	);
    			$img = $manager->make('/public/uploads/'.$year.'/'.$month.'/'.$day, $imgName)->resize(300, 200);

    	
    	$inputs['img'] = '/public/uploads/'.$year.'/'.$month.'/'.$day.'/'.$imgName;
		}
		/// Update profile
		$profile->update($inputs);
	
	}

	

	public function destroy($id)
	{
		$user=Auth::user();
		$profile = $this->profile->findOrFail($id);
		$profile->users()->detach($user->id);
	}

	public function deactivate($id)
    {
        $profile = $this->profile->findOrFail($id);
        $profile->profile_status='0';
        $profile->update();
    }
    
    public function activate($id)
    {
        $profile = $this->profile->findOrFail($id);
        $profile->profile_status='1';
        $profile->update();
    }

}