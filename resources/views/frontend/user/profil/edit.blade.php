@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">
            @if(isset($info))
            <div class="row alert alert-success">{{ $info }}</div>
            @endif
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('labels.update_information_box_title') }}</div>

				<div class="panel-body">

                       {!! Form::model($user, ['route' => ['profil.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}

                              <div class="form-group">
                                    {!! Form::label('username', trans('validation.attributes.username'), ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::input('text', 'username', null, ['class' => 'form-control']) !!}
                                    </div>
                              </div>
                              <div class="form-group">
                                    {!! Form::label('last_name', trans('validation.attributes.last_name'), ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::input('text', 'last_name', null, ['class' => 'form-control']) !!}
                                    </div>
                              </div>
                              <div class="form-group">
                                    {!! Form::label('first_name', trans('validation.attributes.first_name'), ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::input('text', 'first_name', null, ['class' => 'form-control']) !!}
                                    </div>
                              </div>
                              <div class="form-group">
                                    {!! Form::label('gender', trans('validation.attributes.gender'), ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::select('gender',array(
                                        '' => '--Choisissez--',
                                        'Homme' => 'Homme',
                                        'Femme' => 'Femme'
                                        ),$user->gender ) !!}
                                    </div>
                              </div>
                              <div class="form-group">
                            {!! Form::label('birthday', trans('validation.attributes.birthday'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('date', 'birthday', null, ['class' => 'form-control', 'placeholder' => 'Date', 'max' => Carbon\Carbon::today()->format('Y-m-d'), 'min' => '1900-01-01']) !!}
                            </div>
                              </div>
                              <div class="form-group">
                                    {!! Form::label('tel', trans('validation.attributes.tel'), ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::input('text', 'tel', null, ['class' => 'form-control']) !!}
                                    </div>
                              </div>
                              <div class="form-group">
                                    {!! Form::label('province', trans('validation.attributes.province'), ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::input('text', 'province', null, ['class' => 'form-control']) !!}
                                    </div>
                              </div>
                              <div class="form-group">
                                    {!! Form::label('city', trans('validation.attributes.city'), ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::input('text', 'city', null, ['class' => 'form-control']) !!}
                                    </div>
                              </div>
                              <div class="form-group">
                                    {!! Form::label('address', trans('validation.attributes.address'), ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                       {!! Form::textarea('address',null, ['class' => 'form-control','size' => '3x5']) !!}
                                    </div>
                              </div>

                              @if ($user->canChangeEmail())
                                  <div class="form-group">
                                      {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-4 control-label']) !!}
                                      <div class="col-md-6">
                                          {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
                                      </div>
                                  </div>
                              @endif

                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      {!! Form::submit(trans('labels.save_button'), ['class' => 'btn btn-primary']) !!}
                                  </div>
                              </div>

                       {!! Form::close() !!}

				</div><!--panel body-->

			</div><!-- panel -->

		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection