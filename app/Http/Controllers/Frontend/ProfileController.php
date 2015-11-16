<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Frontend\ProfileRepository;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {

        $this->profileRepository = $profileRepository;
    }
    public function index()
    {
            //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       

        return view('frontend.user.profiles.create');

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ProfileRequest $request)
    {

        $inputs = array_merge($request->only('last_name','first_name','gender','size','weight','color_eye','color_hair','address','city','blood','province','fonction','birthday','tel_mobile','tel_home','img'));
        $this->profileRepository->store($inputs);

        return redirect('profiles/view');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
   
    public function show($id)
    {
       $profile=Profile::find($id);
       return view('frontend.user.profiles.show', compact('profile'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $profile=Profile::find($id);
       return view('frontend.user.profiles.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $inputs = array_merge($request->only('last_name','first_name','gender','size','weight','color_eye','color_hair','address','city','blood','province','fonction','birthday','tel_mobile','tel_home','img'));
        

        $this->profileRepository->update($inputs,$id);
        
        return redirect('profiles/show/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */



    public function destroy($id)
    {
        $this->profileRepository->destroy($id);

        return redirect()->back();
    }

    public function deactivate($id)
    {
        $this->profileRepository->deactivate($id);
        return redirect()->back();
    }
    
    public function activate($id)
    {
        $this->profileRepository->activate($id);
        return redirect()->back();
    }
}
