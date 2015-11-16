<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Frontend\DoctorRepository;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Profile;
use Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $doctorRepository;

    public function __construct(DoctorRepository $doctorRepository)
    {

        $this->doctorRepository = $doctorRepository;
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
        return view('frontend.user.doctors.create',compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(DoctorRequest $request)
    {
        $inputs = array_merge($request->only('name','tel','city','specialty','address','location_geo','profile_id'));
        $id = $inputs['profile_id'];
        $this->doctorRepository->store($inputs);

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
        $doctor=Doctor::find($id);
        return view('frontend.user.doctors.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(DoctorRequest $request, $id)
    {
        $inputs = array_merge($request->only('name','tel','city','specialty','address','location_geo'));
        

        $this->doctorRepository->update($inputs,$id);
        $profile =Doctor::find($id)->profile;

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
        $profile =Doctor::find($id)->profile;
        $this->doctorRepository->destroy($id);
        
        return redirect('profiles/show/'.$profile->id);

    }
}
