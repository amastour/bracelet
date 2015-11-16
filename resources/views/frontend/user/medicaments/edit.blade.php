@extends('frontend.layouts.master')

@section('content')
<br>

@if(Auth::check())

    <div class="col-sm-offset-3 col-sm-6">
        @if(isset($info))
        <div class="row alert alert-success">{{ $info }}</div>
        @endif
        <div class="panel panel-default">
         
            <div class="panel-heading">Mise à jour du médicament</div>
            <div class="panel-body"> 
                       {!! Form::model($medicament, ['route' => ['medicament.update', $medicament->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}
                    <div class="form-group">
                            {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('name', 'name', old('name'), ['class' => 'form-control']) !!}
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
        {!! Form::open(['method' => 'DELETE', 'route' => ['medicament.destroy', $medicament->id]]) !!}
        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger ', 'onclick' => 'return confirm(\'Vraiment supprimer ce médicament ?\')']) !!}
        {!! Form::close() !!}
    </div>


@endif
@endsection