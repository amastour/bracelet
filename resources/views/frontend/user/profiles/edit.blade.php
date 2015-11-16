@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
        @if(isset($info))
        <div class="row alert alert-success">{{ $info }}</div>
        @endif
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('labels.update_personal_information_box_title') }}</div>

                <div class="panel-body">

                       {!! Form::model($profile, ['route' => ['profile.update', $profile->id], 'class' => 'form-horizontal', 'files' => true, 'method' => 'PATCH']) !!}

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
                            {!! Form::label('gender', trans('validation.attributes.gender'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('gender',array(
                                '' => '--Choisissez--',
                                'Homme' => 'Homme',
                                'Femme' => 'Femme'
                                ),$profile->gender) !!}
                              
                            </div>
                    </div>
                     <div class="form-group">
                            {!! Form::label('birthday', trans('validation.attributes.birthday'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('date', 'birthday', null, ['class' => 'form-control', 'placeholder' => 'Date', 'max' => Carbon\Carbon::today()->format('Y-m-d'), 'min' => '1900-01-01']) !!}
                            </div>
                    </div>
                     <div class="form-group">
                            {!! Form::label('size', trans('validation.attributes.size'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('size', 'size', old('size'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                     <div class="form-group">
                            {!! Form::label('weight', trans('validation.attributes.weight'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('weight', 'weight', old('weight'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                     <div class="form-group">
                            {!! Form::label('color_hair', trans('validation.attributes.color_hair'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                 {!! Form::select('color_hair',array(
                                '' => '--Choisissez--',
                                'Noir' => 'Noir',
                                'Marron' => 'Marron',
                                'Chatain' => 'Châtain',
                                'Blond' => 'Blond',
                                'Blanc' => 'Blanc',
                                'Roux'=> 'Roux',
                                'Autre'=>'Autre'
                                ),$profile->color_hair)  !!}
                            </div>
                    </div>
                     <div class="form-group">
                            {!! Form::label('color_eye', trans('validation.attributes.color_eye'), ['class' => 'col-md-4 control-label']) !!}
                             <div class="col-md-6">
                                {!! Form::select('color_eye',array(
                                '' => '--Choisissez--',
                                'Noir' => 'Noir',
                                'Marron' => 'Marron',
                                'Vert' => 'Vert',
                                'Bleu' => 'Bleu',
                                'Gris' => 'Gris',
                                'Brun' => 'Brun'
                                ),$profile->color_eye) !!}
                              
                            </div>
                    </div>
                    <div class="form-group">
                            {!! Form::label('blood', trans('validation.attributes.blood'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('blood',array(
                                '' => '--Choisissez--',
                                'O+' => 'O+',
                                'O-' => 'O-',
                                'A+' => 'A+',
                                'A-' => 'A-',
                                'B+' => 'B+',
                                'B-' => 'B-',
                                'AB+' => 'AB+',
                                'AB-' => 'AB-'
                                ),$profile->blood) !!}

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
                            {!! Form::label('address', trans('validation.attributes.address'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('address',null, ['class' => 'form-control','size' => '3x5']) !!}
                            </div>
                    </div>
                     <div class="form-group">
                            {!! Form::label('city', trans('validation.attributes.city'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('city', 'city', old('city'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                     <div class="form-group">
                            {!! Form::label('province', trans('validation.attributes.province'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('province', 'province', old('province'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                    <div class="form-group">
                            {!! Form::label('fonction', trans('validation.attributes.fonction'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('fonction', 'fonction', old('fonction'), ['class' => 'form-control']) !!}
                            </div>
                    </div>
                    
                    <div class="form-group">
                    {!! Form::label('img', trans('validation.attributes.img'), ['class' => 'col-md-4 control-label']) !!}
                    @if(!empty($profile->img))
                    <div class="col-md-6">                
                    
                    <img  src="{{ url($profile->img)}}" >
                    &nbsp;<a href="#" class="current-img"><span class="glyphicon glyphicon-remove-circle remove-img"></span></a>
                    </div>
                    @else
                    {!! Form::file('img', null, ['class' => 'form-control file']) !!}
                    @endif
                    </div>


                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              {!! Form::submit(trans('labels.edit_button'), ['class' => 'btn btn-primary']) !!}
                          </div>
                      </div>

                       {!! Form::close() !!}

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection