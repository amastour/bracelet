<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Frontend\MedicamentRepository;
use App\Http\Requests\MedicamentRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Medicament;
use App\Profile;
use Auth;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $medicamentRepository;

    public function __construct(MedicamentRepository $medicamentRepository)
    {

        $this->medicamentRepository = $medicamentRepository;
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
        return view('frontend.user.medicaments.create',compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(MedicamentRequest $request)
    {
        $inputs = array_merge($request->only('name','notes','profile_id'));
        $id = $inputs['profile_id'];
        $this->medicamentRepository->store($inputs);
        
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
        $medicament=Medicament::find($id);
        return view('frontend.user.medicaments.edit',compact('medicament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(MedicamentRequest $request, $id)
    {
        $inputs = array_merge($request->only('name','notes'));
        $this->medicamentRepository->update($inputs,$id);
        $profile =Medicament::find($id)->profile;

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
        $profile =Medicament::find($id)->profile;
        $this->medicamentRepository->destroy($id);

        return redirect('profiles/show/'.$profile->id);

    }
}
