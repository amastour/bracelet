@extends('frontend.layouts.master')

@section('content')
<br>

@if(Auth::check())

    <div class="col-sm-offset-3 col-sm-6">
        @if(isset($info))
        <div class="row alert alert-success">{{ $info }}</div>
        @endif
        <div class="panel panel-default">
         
            <div class="panel-heading">Ajout d'un médecin</div>
            <div class="panel-body"> 
                {!! Form::open(['route' => 'doctor.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    {!! Form::hidden('profile_id',$profile->id,array('id' => 'profile_id')) !!}
                    <div class="form-group">
                            {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('name', 'name', old('name'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                     <div class="form-group">
                            {!! Form::label('tel', trans('validation.attributes.tel'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('tel', 'tel', old('tel'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                    <div class="form-group">
                            {!! Form::label('city', trans('validation.attributes.city'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('city', 'city', old('city'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                    <div class="form-group">
                            {!! Form::label('specialty', trans('validation.attributes.specialty'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('specialty', 'specialty', old('specialty'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                    
                    <div class="form-group">
                            {!! Form::label('address', trans('validation.attributes.address'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('address',null, ['class' => 'form-control','size' => '3x4']) !!}
                            </div>
                    </div>

                    <div class="form-group">
                            {!! Form::label('location_geo', trans('validation.attributes.location_geo'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('location_geo',null, ['class' => 'form-control','size' => '3x4']) !!}
                            </div>
                    </div>
                     
                     
                    
                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Enregister', ['class' => 'btn btn-primary ']) !!}
                                {!! Form::close() !!}
                            </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>


@endif
@endsection