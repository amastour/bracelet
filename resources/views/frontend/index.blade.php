@extends('frontend.layouts.master')

@section('content')
<br>

    <div class="col-sm-offset-3 col-sm-6">
        @if(isset($error))
        <div class="row alert alert-danger">{{ $error }}</div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">Recherche d'un profil</div>
            <div class="panel-body"> 
                {!! Form::open(['url' => 'bracelet/show', 'class' => 'form-horizontal', 'role' => 'form']) !!}
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
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Valider', ['class' => 'btn btn-primary ']) !!}
                                {!! Form::close() !!}
                            </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection