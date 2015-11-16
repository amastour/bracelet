<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Frontend\OperationRepository;
use App\Http\Requests\OperationRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Operation;
use App\Profile;
use Auth;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $operationRepository;

    public function __construct(OperationRepository $operationRepository)
    {

        $this->operationRepository = $operationRepository;
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
        return view('frontend.user.operations.create',compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(OperationRequest $request)
    {
        $inputs = array_merge($request->only('name','op_date','notes','profile_id'));
        $id = $inputs['profile_id'];
        $this->operationRepository->store($inputs);
        
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
        $operation=Operation::find($id);
        return view('frontend.user.operations.edit',compact('operation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(OperationRequest $request, $id)
    {
        $inputs = array_merge($request->only('name','op_date','notes'));
        

        $this->operationRepository->update($inputs,$id);
        $profile =Operation::find($id)->profile;

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
        $profile =Operation::find($id)->profile;
        $this->operationRepository->destroy($id);
        return redirect('profiles/show/'.$profile->id);

    }
}
