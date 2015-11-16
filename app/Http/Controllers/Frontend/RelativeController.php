<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Frontend\RelativeRepository;
use App\Http\Requests\RelativeRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Relative;
use App\Profile;
use Auth;

class RelativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $relativeRepository;

    public function __construct(RelativeRepository $relativeRepository)
    {

        $this->relativeRepository = $relativeRepository;
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
    public function create($id)
    {
        $profile=Profile::find($id);
        return view('frontend.user.relatives.create',compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RelativeRequest $request)
    {
        $inputs = array_merge($request->only('last_name','first_name','tel_mobile','tel_home','relationship','location_geo','profile_id'));
        $id = $inputs['profile_id'];
        $this->relativeRepository->store($inputs);
        
        return redirect('profiles/show/'.$id);
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
    public function edit($id)
    {
        $relative=Relative::find($id);
        return view('frontend.user.relatives.edit',compact('relative'));
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
        $inputs = array_merge($request->only('last_name','first_name','tel_mobile','tel_home','relationship','location_geo'));
        $this->relativeRepository->update($inputs,$id);
        $profile =Relative::find($id)->profile;

        return redirect('profiles/show/'.$profile->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $profile =Relative::find($id)->profile;
        $this->relativeRepository->destroy($id);
        
        return redirect('profiles/show/'.$profile->id);

    }
}
