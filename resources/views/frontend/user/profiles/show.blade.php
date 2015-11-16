@extends('frontend.layouts.master')

@section('content')


<div class="col-sm-12">
<div class="row">
    <div class="col-xs-6 col-sm-8">
        <h1 id="profile-name">{{$profile->name()}}</h1>
     
        <div class="quick-about"> {{$profile->calculateAge()}} ans, {{$profile->gender}} de {{$profile->city}}</div>
        <div class="update-text">Dernière mise à jour {{$profile->created_at}}</div><br>
        @if(Auth::check())
            @if(Auth::user()->profiles($profile->id))
            <div class="btn-group">
                <button class="glyphicon glyphicon-cog btn btn-default dropdown-toggle profile-action" data-toggle="dropdown" type="button">
                <i class="caret"></i>
                </button>
                <ul class="dropdown-menu profile-action-menu" role="menu">
                    <li><a href="/profiles/link/{{$profile->id}}">Lier à un bracelet</a></li>
                    <li><a href="/profiles/29425/download_qr_code">Télécharger Code QR</a></li>
                    <li class="divider"></li>
                    <li><a href="/profile/29425.pdf">Exporter PDF</a></li>
                    <li><a href="javascript:window.print()">Print</a></li>
                </ul>
            </div>
            @endif
        @endif
    </div>
    <div class="col-xs-6 col-sm-4">
        <div class="user-picture pull-right  img-responsive">
            @if(!empty($profile->img))
            <img alt="img" class=" img-thumbnail img-circle" src="{{ url($profile->img)}}" >
            @else
            <img alt="Default" class=" img-thumbnail img-circle" src="https://secure.gravatar.com/avatar/9907bad00a3b9f1fcf77715128cda1f5.png?d=https://d2a5h90l5u8a1v.cloudfront.net/assets/default.gif&amp;r=PG&amp;s=200">
            @endif        </div>
    </div>
               

    <!-- Informations personnelles -->
    <div class="row personal-info-pane">
        <div class="title-tab">
            <h3 class="no-add"><i class="glyphicon glyphicon-plus-sign"></i> Informations Personnelles</h3>
        </div>
        <div class="col-sm-12">
            <div class="row dashboard-section">
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.last_name')}}</h4><span >{{$profile->last_name}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.first_name')}}</h4><span class="blank">{{$profile->first_name}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.gender')}}</h4><span class="blank">{{$profile->gender}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.birthday')}}</h4><span class="blank">{{$profile->birthday}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.tel_mobile')}}</h4><span class="blank">{{$profile->tel_mobile}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.tel_home')}}</h4><span class="blank">{{$profile->tel_home}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.color_hair')}}</h4><span class="blank">{{$profile->color_hair}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.color_eye')}}</h4><span class="blank">{{$profile->color_eye}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.size')}}</h4><span class="blank">{{$profile->size}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.weight')}}</h4><span class="blank">{{$profile->weight}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.blood')}}</h4><span class="blank">{{$profile->blood}}</span></div>               
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.city')}}</h4><span class="blank">{{$profile->city}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.province')}}</h4><span class="blank">{{$profile->province}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.address')}}</h4><span class="blank">{{$profile->address}}</span></div>
                <div class="col-xs-6 col-sm-3"><h4>{{trans('validation.attributes.fonction')}}</h4><span class="blank">{{$profile->fonction}}</span></div>
                @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <div>
                <a href="../edit/{{$profile->id}}" class="link edit"><span class="glyphicon glyphicon-pencil"></span>Editer</a>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>

    <!--Proches-->

    <div class="row relative-pane">
        <div class="title-tab">
            <h3 class="no-add">
                <i class="glyphicon glyphicon-plus-sign"></i> Proches 
                 @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <a class="btn btn-primary btn-xs" href="../../relatives/create/{{$profile->id}}" >+</a>
                @endif
                @endif
            </h3>

        </div>
        <div class="col-sm-12">
            <div class="row dashboard-section">
                <div class="col-md-2">
                    <h4>Nom</h4>
                </div>
                <div class="col-md-2">
                    <h4>Prénom</h4>
                </div>

                <div class="col-md-2">
                    <h4>Téléphone portable</h4>
                </div>
                <div class="col-md-2">
                    <h4>Téléphone fixe</h4>
                </div>

                <div class="col-md-2"><h4>Relation</h4>
                </div>
                <div class="col-md-2">
                    <h4>Localisation géographique</h4>
                </div>

            </div>

            @foreach($profile->relatives as $relative)
             <div class="row dashboard-section">
                <div class="col-md-2">
                    <span class="blank">{{$relative->last_name}}</span>
                </div>
                <div class="col-md-2">
                    <span class="blank">{{$relative->first_name}}</span>
                </div>

                <div class="col-md-2">
                    <span class="blank">{{$relative->tel_mobile}}</span>
                </div>
                <div class="col-md-2">
                    <span class="blank">{{$relative->tel_home}}</span>
                </div>
  
                <div class="col-md-2"><span class="blank">{{$relative->relationship}}</span>
                </div>
                <div class="col-md-2">
                    <span class="blank">{{$relative->location_geo}}</span><br>
                </div>
                @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <div>
                    <a href="../../relatives/edit/{{$relative->id}}" class="link edit">
                    <span class="glyphicon glyphicon-pencil"></span>Editer
                    </a>
                </div>
                @endif
                @endif
            </div>
            @endforeach
                

        </div>
    </div>

    <!-- Maladies-->
    <div class="row disease-pane">
        <div class="title-tab">
            <h3 class="no-add">
                <i class="glyphicon glyphicon-plus-sign"></i> Maladies
                 @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <a class="btn btn-primary btn-xs" href="../../diseases/create/{{$profile->id}}">+</a>
                @endif
                @endif
            </h3>
        </div>
        <div class="col-sm-12">
            <div class="row dashboard-section">
                <div class="col-sm-2 col-xs-6">
                    <h4>Nom</h4><br>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <h4>Niveau</h4>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <h4>Notes</h4>
                </div>
                    <div class="clearfix visible-xs"></div>
                    <div class="col-sm-2 col-xs-6"><h4>Interdictions</h4>
                    </div>

            </div>

            @foreach($profile->diseases as $disease)
             <div class="row dashboard-section">
                <div class="col-sm-2 col-xs-6">
                    <span class="blank">{{$disease->name}}</span><br>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <span class="blank">{{$disease->level}}</span><br>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <span class="blank">{{$disease->notes}}</span>
                </div>
                    <div class="clearfix visible-xs"></div>
                <div class="col-sm-2 col-xs-6"><span class="blank">{{$disease->prohibitions}}</span>
                </div>
                @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <div>
                    <a href="../../diseases/edit/{{$disease->id}}" class="link edit">
                    <span class="glyphicon glyphicon-pencil"></span>Editer
                     </a>
                </div>
                @endif
                @endif

            </div>
            @endforeach
            

        </div>
    </div>
    <!--Médicaments -->
   <div class="row medicament-pane">
        <div class="title-tab">
            <h3 class="no-add">
                <i class="glyphicon glyphicon-plus-sign"></i> Médicaments 
                 @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <a class="btn btn-primary btn-xs" href="../../medicaments/create/{{$profile->id}}">+</a>
                @endif
                @endif
            </h3>
        </div>
        <div class="col-sm-12">
            <div class="row dashboard-section">
                <div class="col-sm-5 col-md-6">
                    <h4>Nom Medicament</h4><br>
                </div>
                <div class="col-sm-5 col-md-6">
                    <h4>Notes</h4>
                </div>
            </div>

            @foreach($profile->medicaments as $medicament)
            <div class="row dashboard-section">
                <div class="col-sm-5 col-md-6">
                    <span class="blank">{{$medicament->name}}</span><br>
                </div>
                <div class="col-sm-5 col-md-6">
                    <span class="blank">{{$medicament->notes}}</span><br>
                </div>
                @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <div>
                    <a href="../../medicaments/edit/{{$medicament->id}}" class="link edit">
                    <span class="glyphicon glyphicon-pencil"></span>Editer
                     </a>
                </div>
                @endif
                @endif
            </div>
            @endforeach
                

        </div>
    </div>
    <!--Médecins -->
   <div class="row doctor-pane">
        <div class="title-tab">
            <h3 class="no-add">
                <i class="glyphicon glyphicon-plus-sign"></i> Médecins 
                 @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <a class="btn btn-primary btn-xs" href="../../doctors/create/{{$profile->id}}">+</a>
                @endif
                @endif
            </h3>
        </div>
        <div class="col-sm-12">
            <div class="row dashboard-section">
                <div class="col-md-2">
                    <h4>Nom Complet</h4><br>
                </div>
                <div class="col-md-2">
                    <h4>téléphone</h4>
                </div>
                <div class="col-md-2">
                    <h4>Ville</h4>
                </div>
                <div class="col-md-2">
                    <h4>Spécialité</h4>
                </div>
                <div class="col-md-2">
                    <h4>Adresse</h4>
                </div>
                <div class="col-md-2">
                    <h4>Localisation géographique</h4>
                </div>
            </div>

            @foreach($profile->doctors as $doctor)
            <div class="row dashboard-section">
                <div class="col-md-2">
                    <span class="blank">{{$doctor->name}}</span><br>
                </div>
                <div class="col-md-2">
                    <span class="blank">{{$doctor->tel}}</span><br>
                </div>
                <div class="col-md-2">
                    <span class="blank">{{$doctor->city}}</span><br>
                </div>
                <div class="col-md-2">
                    <span class="blank">{{$doctor->specialty}}</span><br>
                </div>
                <div class="col-md-2">
                    <span class="blank">{{$doctor->address}}</span><br>
                </div>
                <div class="col-md-2">
                    <span class="blank">{{$doctor->location_geo}}</span><br>
                </div>
                @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <div>
                    <a href="../../doctors/edit/{{$doctor->id}}" class="link edit">
                    <span class="glyphicon glyphicon-pencil"></span>Editer
                    </a>
                </div>
                @endif
                @endif
            </div>
            @endforeach
                

        </div>
    </div>
    <!--Opérations -->
   <div class="row operation-pane">
        <div class="title-tab">
            <h3 class="no-add">
                <i class="glyphicon glyphicon-plus-sign"></i> Opérations
                 @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <a class="btn btn-primary btn-xs" href="../../operations/create/{{$profile->id}}">+</a>
                @endif
                @endif
            </h3>
        </div>
        <div class="col-sm-12">
            <div class="row dashboard-section">
                <div class="col-xs-6 col-md-4">
                    <h4>Nom</h4><br>
                </div>
                <div class="col-xs-6 col-md-4">
                    <h4>Date</h4>
                </div>
                <div class="col-xs-6 col-md-4">
                    <h4>Notes</h4>
                </div>
            </div>

            @foreach($profile->operations as $operation)
            <div class="row dashboard-section">
                <div class="col-xs-6 col-md-4">
                    <span class="blank">{{$operation->name}}</span><br>
                </div>
                <div class="col-xs-6 col-md-4">
                    <span class="blank">{{$operation->op_date}}</span><br>
                </div>
                <div class="col-xs-6 col-md-4">
                    <span class="blank">{{$operation->notes}}</span><br>
                </div>
                @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <div>
                    <a href="../../operations/edit/{{$operation->id}}" class="link edit">
                    <span class="glyphicon glyphicon-pencil"></span>Editer
                    </a>
                </div>
                @endif
                @endif
            </div>
            @endforeach
                

        </div>
    </div>
    <!--Other options -->
   <div class="row other-pane">
        <div class="title-tab">
            <h3 class="no-add">
                <i class="glyphicon glyphicon-plus-sign"></i> Autres 
                @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <a class="btn btn-primary btn-xs" href="../../others/create/{{$profile->id}}">+</a>
                @endif
                @endif
        </div>
        <div class="col-sm-12">
            <div class="row dashboard-section">
                <div class="col-md-4">
                    <h4>Label</h4><br>
                </div>
                <div class="col-md-8">
                    <h4>Notes</h4>
                </div>
            </div>

            @foreach($profile->others as $other)
            <div class="row dashboard-section">
                <div class="col-md-4">
                    <span class="blank">{{$other->label}}</span><br>
                </div>
                <div class="col-md-8">
                    <span class="blank">{{$other->notes}}</span><br>
                </div>
                @if(Auth::check())
                @if(Auth::user()->profiles($profile->id))
                <div>
                    <a href="../../others/edit/{{$other->id}}" class="link edit">
                    <span class="glyphicon glyphicon-pencil"></span>Editer
                    </a>
                </div>
                @endif
                @endif
            </div>
            @endforeach
                

        </div>
    </div>
    </div>

</div>

@endsection