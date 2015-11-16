@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">
		@if(isset($info))
        <div class="row alert alert-success">{{ $info }}</div>
        @endif
        @if(isset($error))
        <div class="row alert alert-danger">{{ $error }}</div>
        @endif

			<div class="panel panel-default">
				<div class="panel-heading">Invitation</div>

				<div class="panel-body">

                 <h4> Veuillez saisir l'email de la personne que vous désirez inviter.</h4>

                {!! Form::open(['route' => 'invitation.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        {!! Form::hidden('profile_id',$profile->id,array('id' => 'profile_id')) !!}
                        <div class="form-group">
                            {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                       <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              {!! Form::submit('Valider', ['class' => 'btn btn-primary']) !!}
     
                          </div>
                       </div>

                {!! Form::close() !!}

				</div><!--panel body-->

			</div><!-- panel -->

		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection