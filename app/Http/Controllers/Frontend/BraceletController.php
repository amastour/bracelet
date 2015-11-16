<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Frontend\BraceletRepository;
use App\Http\Requests\BraceletRequest;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Bracelet;
use App\Type;
use DateTime;


class BraceletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $braceletRepository;

    public function __construct(BraceletRepository $braceletRepository)
    {

        $this->braceletRepository = $braceletRepository;
    }
    //  La page qui demande à l'utilisateur le code id et pin du bracelet qu'il veut lier au profil
    public function index($id)
    {
        $profile=Profile::find($id);
        return view('frontend.user.profiles.link',compact('profile'));
    }



    public function present()
    {
        $types = Type::all();
        return view('frontend.user.bracelets.present',compact('types'));
    }
    
    public function detail($id)
    {
        $type=Type::find($id);
        
        return view('frontend.user.bracelets.details',compact('type'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
     
    /// Les opérations effectuées pour lier un profil à un bracelet
    public function store(BraceletRequest $request)
    {
        $inputs = array_merge($request->only('code_id','pin','puk','profile_id'));
        
        $code_id=$inputs['code_id'];
		$pin=$inputs['pin'];
		$puk=$inputs['puk'];
		$profile_id=$inputs['profile_id'];
		$profile=Profile::find($profile_id);
		
		$bracelet_exist =Bracelet::where('code_id', '=',$code_id)->where('pin', '=', $pin)->where('puk', '=', $puk)->first();
        // Tester si bracelet (code  id, pin et puk) existe
		if((count($bracelet_exist)==1))
		{
			$profile_exist = Bracelet::find($bracelet_exist->id)->profile;
			// Tester si ce profil est déjà lié à ce bracelet
			if($profile_exist->id==$profile_id)
			{
				$info="Ce profil est déjà lié à ce bracelet.";
				return view('frontend.user.profiles.link',compact('info','profile'));
			}
			// Tester si le bracelet est déjà lié à un autre profil
			elseif(!empty($profile_exist->id))
			{
				$error="Impossible! Vous ne pouvez pas lier ce profil à ce bracelet, ce dernier est déjà pris par un autre profil.";
				return view('frontend.user.profiles.link',compact('error','profile'));
			}
			else
			{   
			    $now = new DateTime();
			    $bracelet_exist->link_date=$now;
				$bracelet_exist->profile()->id=$profile_id;
				$bracelet_exist->update();
				$success="Profil lié avec succès.";
				return view('frontend.user.profiles.link',compact('success','profile'));
			}
		}
		else
		{
			$error="Code Id ou PIN ou PUK n'existent pas.";
			return view('frontend.user.profiles.link',compact('error','profile'));
		}
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
     
    // Afficher le profil du bracelet
    public function show(Request $request)
    {
        $inputs = array_merge($request->only('code_id','pin'));
        
        $code_id=$inputs['code_id'];
		$pin=$inputs['pin'];
        // Recherche d'un bracelet de code id= $code_id et de pin= $pin 
		$bracelet_exist =Bracelet::where('code_id', '=',$code_id)->where('pin', '=', $pin)->first();
		// Tester si bracelet existe
        if((count($bracelet_exist)==1))
        {  
            // Chercher le profil qui lié à ce bracelet
        	$profile_exist = Bracelet::find($bracelet_exist->id)->profile;
        	// Si aucun profil ne correspond à ce bracelet
            if(empty($profile_exist->id))
            {
                $error="Profil n'existe pas";
                return view('frontend.index',compact('error'));
            }
            else
            {   
                $profile=Profile::find($profile_exist->id);
                if($profile->profile_status==1)
                {
                    return redirect('profiles/show/'.$profile->id);
                }
                else
                {
                    $error="Profil n'existe pas";
                    return view("frontend.index",compact('error'));
                }
            }
        }
        else
        {
            $error="Profil n'existe pas";
		    return view('frontend.index',compact('error'));
        }
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
