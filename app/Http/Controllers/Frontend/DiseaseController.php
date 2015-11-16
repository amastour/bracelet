<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Frontend\DiseaseRepository;
use App\Http\Requests\DiseaseRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Disease;
use App\Profile;
use Auth;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $diseaseRepository;

    public function __construct(DiseaseRepository $diseaseRepository)
    {

        $this->diseaseRepository = $diseaseRepository;
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
        return view('frontend.user.diseases.create',compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(DiseaseRequest $request)
    {
        $inputs = array_merge($request->only('profile_id','name','level','notes','prohibitions'));
        $id = $inputs['profile_id'];
        $this->diseaseRepository->store($inputs);
        
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
        $disease=Disease::find($id);
        return view('frontend.user.diseases.edit',compact('disease'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(DiseaseRequest $request, $id)
    {
        $inputs = array_merge($request->only('name','level','notes','prohibitions'));
        
        
        $this->diseaseRepository->update($inputs,$id);
        $profile =Disease::find($id)->profile;

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
        $profile =Disease::find($id)->profile;
        $this->diseaseRepository->destroy($id);

        return redirect('profiles/show/'.$profile->id);

    }
}
