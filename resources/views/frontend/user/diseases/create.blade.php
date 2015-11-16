@extends('frontend.layouts.master')

@section('content')
<br>

@if(Auth::check())

    <div class="col-sm-offset-3 col-sm-6">
        @if(isset($info))
        <div class="row alert alert-success">{{ $info }}</div>
        @endif
        <div class="panel panel-default">

            <div class="panel-heading">Ajout d'une maladie</div>
            <div class="panel-body"> 
                {!! Form::open(['route' => 'disease.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    {!! Form::hidden('profile_id',$profile->id,array('id' => 'profile_id')) !!}
                    <div class="form-group">
                            {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('name', 'name', old('name'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                    
                    <div class="form-group">
                            {!! Form::label('level', trans('validation.attributes.level'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('level', 'level', old('level'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    
                     <div class="form-group">
                            {!! Form::label('notes', trans('validation.attributes.notes'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('notes',null, ['class' => 'form-control','size' => '3x4']) !!}
                            </div>
                    </div>
                     <div class="form-group">
                            {!! Form::label('prohibitions', trans('validation.attributes.prohibitions'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('prohibitions',null, ['class' => 'form-control','size' => '3x4']) !!}
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