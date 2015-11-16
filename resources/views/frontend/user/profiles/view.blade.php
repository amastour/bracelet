@extends('frontend.layouts.master')

@section('content')


@if(Auth::check())
<div id="main" role="main">
    <div class="container">
        <div id="profile-page">
            <h2>Gestion de profils</h2>
            
     
       
        @foreach($user->profiles as $profile)
            <div id="profile-list" class="ui-sortable">
                <div class="profile-box" data-profile-id="29425">
                    <div class="row">
                        <div class="col-sm-9 col-md-10" id="profile-info-29425">
                            <div class="row profile-info-wrapper">
                                <div class="col-sm-4 col-md-3">
                                    <div class="img-responsive" id="info-div">
                                        @if(!empty($profile->img))
                                        <img alt="img" class=" img-thumbnail img-circle" src="{{ url($profile->img)}}" >
                                        @else
                                        <img alt="Default" class=" img-thumbnail img-circle" src="https://secure.gravatar.com/avatar/9907bad00a3b9f1fcf77715128cda1f5.png?d=https://d2a5h90l5u8a1v.cloudfront.net/assets/default.gif&amp;r=PG&amp;s=200">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-9 profile-details">
                                   
                                    <h1 class="name">{{$profile->name()}}</h1> 
                                    <div class="quick-about">{{$profile->calculateAge()}} ans, {{$profile->gender}} de {{$profile->city}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-2 text-center action-menu" div-preferrence="profile-info-29425" id="profile-action-29425">
                            <a href="show/{{$profile->id}}" class="btn btn-primary ">Afficher</a>
                            <br><br>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['profile.destroy', $profile->id]]) !!}
                            {!! Form::submit('Supprimer ce profil', ['class' => 'btn btn-danger ', 'onclick' => 'return confirm(\'Vraiment supprimer ce profil ?\')']) !!}
                        {!! Form::close() !!}
                        <br>
                        @if($profile->profile_status==1)
                        <a href="deactivate/{{$profile->id}}" class="btn btn-primary ">Désactiver</a>
                        @endif
                        @if($profile->profile_status==0)
                        <a href="activate/{{$profile->id}}" class="btn btn-primary ">Activer</a>
                        @endif
                        <br><br>
                        <a href="../invite/{{$profile->id}}" class="btn btn-primary ">Inviter</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


            <div class="text-center">
                <a href="create" class="btn btn-primary btn-lg">Ajouter un nouveau profil</a>
            </div>
            <br><br>
        </div>
    </div>
</div>
@endif

@endsection