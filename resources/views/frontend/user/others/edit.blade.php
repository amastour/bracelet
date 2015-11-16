@extends('frontend.layouts.master')

@section('content')
<br>

@if(Auth::check())

    <div class="col-sm-offset-3 col-sm-6">
        @if(isset($info))
        <div class="row alert alert-success">{{ $info }}</div>
        @endif
        <div class="panel panel-default">
         
            <div class="panel-heading">Mise à jour </div>
            <div class="panel-body"> 
                       {!! Form::model($other, ['route' => ['other.update', $other->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}
                    <div class="form-group">
                            {!! Form::label('label', trans('validation.attributes.label'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('label', 'label', old('label'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    
                    
                     <div class="form-group">
                            {!! Form::label('notes', trans('validation.attributes.notes'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('notes',null, ['class' => 'form-control','size' => '3x4']) !!}
                            </div>
                    </div>
                     
                     
                    
                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Mise à jour', ['class' => 'btn btn-primary ']) !!}
                                {!! Form::close() !!}
                            </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        {!! Form::open(['method' => 'DELETE', 'route' => ['other.destroy', $other->id]]) !!}
        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger ', 'onclick' => 'return confirm(\'Vraiment supprimer ?\')']) !!}
        {!! Form::close() !!}
    </div>


@endif
@endsection