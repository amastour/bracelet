<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Frontend\InvitationRepository;
use App\Http\Requests\InvitationRequest;
use App\Http\Controllers\Controller;
use App\Invitation;
use App\User;
use App\Profile;
use Auth;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $invitationRepository;

    public function __construct(InvitationRepository $invitationRepository)
    {

        $this->invitationRepository = $invitationRepository;
    }
    public function index()
    {
        $user=Auth::user();    //Utilisateur connecté
        $sends=Invitation::where('id_from', '=', $user->id)->get();    // Les invitations envoyé par l'utilisateur connecté
        $receives=Invitation::where('id_to', '=', $user->id)->get();   // Les invitations reçu par l'utilisateur connecté
     
        //  Tester si sends et receives existent
        if((count($sends) != 0) && (count($receives) != 0))
        {
            return view('frontend.user.dashboard',compact('user','sends','receives'));
        }
        //  Tester si sends et receives n'existent pas
        elseif((count($sends) == 0) && (count($receives) == 0))
        {   
            $info="Il n'y a aucune invitation envoyée ou reçue";
            return view('frontend.user.dashboard',compact('user','info'));
        }
        //  Tester si sends ou receives n'existe pas 
        else
        {
            if(count($sends) == 0)
          {
            $info="Il n'y a aucune invitation envoyée"; 
            return view('frontend.user.dashboard',compact('user','info','receives'));
          }  
            if(count($receives) == 0)
          {
            $info="Il n'y a aucune invitation reçue";
            return view('frontend.user.dashboard',compact('user','info','sends'));
          } 
            
        }


        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $profile=Profile::find($id); 
        return view('frontend.user.invitations.invite',compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(InvitationRequest $request)
    {
        $inputs = array_merge($request->only('email','profile_id'));
        $id = $inputs['profile_id'];
        $profile=Profile::find($id);   // Le profil qu'on souhaite envoyé à l'invitant pour l'administrer
        
        $user=Auth::user();   // Utilisateur connecté
        
        $email = $request->email;
        $guest = User::where('email', $email)->first(); // Recherche de l'invitant

        //      Si le compte de l'invitant existe 
        if(count($guest) === 1)
        {   
            
            $invitation_exist1 =Invitation::where('id_profile', '=',$id)->where('id_from', '=', $user->id)->where('id_to', '=', $guest->id)->get();
            $invitation_exist2 =Invitation::where('id_profile', '=',$id)->where('id_to', '=', $guest->id)->get();
            $profile_exist =$guest->profiles()->where('profile_id','=',$id)->get();
            
            // Tester si l'invitant administre déjà ce profil
            if(count($profile_exist) === 1) 
            {
                $error='Ce profil est déjà gérer par ce compte';
                return view('frontend.user.invitations.invite',compact('error','profile'));
            }
            // Tester si l'invitant est déjà invité à administrer ce profil par l'utilisateur connecté
            if(count($invitation_exist1) === 1) 
            {
                $error='Impossible ! Votre invitation est déjà envoyé';
                return view('frontend.user.invitations.invite',compact('error','profile'));
            }
            // Tester si l'invitant est déjà invité à administrer ce profil par un autre utilisateur
            if(count($invitation_exist2) === 1)
            {
                $error='Impossible ! Une invitation est déjà envoyé par un autre utilisateur';
                return view('frontend.user.invitations.invite',compact('error','profile'));
            }
            else
            {   
                unset($inputs['profile_id']);
                $this->invitationRepository->store($inputs,$id);
                $info='Votre invitation a été bien envoyé à ce compte';
                return view('frontend.user.invitations.invite',compact('info','profile'));
            }

        }
        //    Si le compte de l'invitant n'existe pas
        else
        {
            $error='Ce compte n\'existe pas';
            return view('frontend.user.invitations.invite',compact('error','profile'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function accept($id)
    {
        $this->invitationRepository->accept($id);
        return redirect('profiles/view')->with('user', Auth::user());
    }
    
    
    public function refuse($id)
    {
        $this->invitationRepository->refuse($id);
        return redirect('profiles/view')->with('user', Auth::user());
    }
    
    
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
    public function update(RelativeRequest $request, $id)
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
        
    
        $this->invitationRepository->destroy($id);
        return redirect('profiles/view')->with('user', Auth::user());

    }
}
