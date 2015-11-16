@extends('frontend.layouts.master')

@section('content')
<br>

@if(Auth::check())

    <div class="col-sm-offset-3 col-sm-6">
        @if(isset($info))
        <div class="row alert alert-success">{{ $info }}</div>
        @endif
        <div class="panel panel-default">
         
            <div class="panel-heading">Ajout d'un proche</div>
            <div class="panel-body"> 
                {!! Form::open(['route' => 'relative.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    {!! Form::hidden('profile_id',$profile->id,array('id' => 'profile_id')) !!}
                    <div class="form-group">
                            {!! Form::label('first_name', trans('validation.attributes.first_name'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('first_name', 'first_name', old('first_name'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    
                    <div class="form-group">
                            {!! Form::label('last_name', trans('validation.attributes.last_name'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('last_name', 'last_name', old('last_name'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                    <div class="form-group">
                            {!! Form::label('relationship', trans('validation.attributes.relationship'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('relationship', 'relationship', old('relationship'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                                         <div class="form-group">
                            {!! Form::label('tel_mobile', trans('validation.attributes.tel_mobile'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('tel_mobile', 'tel_mobile', old('tel_mobile'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                     <div class="form-group">
                            {!! Form::label('tel_home', trans('validation.attributes.tel_home'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('tel_home', 'tel_home', old('tel_home'), ['class' => 'form-control']) !!}
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