<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Frontend\OtherRepository;
use App\Http\Requests\OtherRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Other;
use App\Profile;
use Auth;

class OtherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $otherRepository;

    public function __construct(OtherRepository $otherRepository)
    {

        $this->otherRepository = $otherRepository;
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
        return view('frontend.user.others.create',compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(OtherRequest $request)
    {
        $inputs = array_merge($request->only('label','notes','profile_id'));
        $id = $inputs['profile_id'];
        $this->otherRepository->store($inputs);
        
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
        $other=Other::find($id);
        return view('frontend.user.others.edit',compact('other'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(OtherRequest $request, $id)
    {
        $inputs = array_merge($request->only('label','notes'));
        $this->otherRepository->update($inputs,$id);
        $profile =Other::find($id)->profile;

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
        $profile =Other::find($id)->profile;
        $this->otherRepository->destroy($id);
        
        return redirect('profiles/show/'.$profile->id);

    }
}
