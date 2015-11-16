@extends('frontend.layouts.master')

@section('content')
<br>

@if(Auth::check())

    <div class="col-sm-offset-3 col-sm-6">
        @if(isset($info))
        <div class="row alert alert-info">{{ $info }}</div>
        @endif
        @if(isset($error))
        <div class="row alert alert-danger">{{ $error }}</div>
        @endif
        @if(isset($success))
        <div class="row alert alert-success">{{ $info }}</div>
        @endif
        <div class="panel panel-default">
         
            <div class="panel-heading">Liaison du profil à un bracelet</div>
            <div class="panel-body"> 
                {!! Form::open(['route' => 'bracelet.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    {!! Form::hidden('profile_id',$profile->id,array('id' => 'profile_id')) !!}
                    <div class="form-group">
                            {!! Form::label('code_id', trans('validation.attributes.code_id'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('code_id', 'code_id', old('code_id'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                    
                    <div class="form-group">
                            {!! Form::label('pin', trans('validation.attributes.pin'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('pin', 'pin', old('pin'), ['class' => 'form-control']) !!}
                            </div>
                    </div>

                    <div class="form-group">
                            {!! Form::label('puk', trans('validation.attributes.puk'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('puk', 'puk', old('puk'), ['class' => 'form-control']) !!}
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
    </div>


@endif
@endsection