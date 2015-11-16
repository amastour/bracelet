@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('navs.account') }}</div>
                <!-- Mes informations -->
				<div class="panel-body">
					<div role="tabpanel">

                      <!-- Nav tabs -->
                      <div class="tabbable"> 
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">{{ trans('navs.my_information') }}</a></li>
                        <li><a href="#tab2" data-toggle="tab">{{ trans('navs.my_invitation') }}
                        @if(isset($receives))
                        <span class="badge">{{count($receives)}}</span>
                        @endif
                        </a></li>
                      </ul>

                      <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <table class="table table-striped table-hover table-bordered dashboard-table">
                                <tr>
                                    <th>{{ trans('validation.attributes.username') }}</th>
                                    <td>{!! $user->username !!}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('validation.attributes.last_name') }}</th>
                                    <td>{!! $user->last_name !!}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('validation.attributes.first_name') }}</th>
                                    <td>{!! $user->first_name !!}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('validation.attributes.email') }}</th>
                                    <td>{!! $user->email !!}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('validation.attributes.tel') }}</th>
                                    <td>{!! $user->tel !!}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('validation.attributes.actions') }}</th>
                                    <td>
                                        <a href="{!!route('profil.edit', $user->id)!!}" class="btn btn-primary btn-xs">{{ trans('labels.edit_information') }}</a>
                                        <a href="{!!url('auth/password/change')!!}" class="btn btn-warning btn-xs">{{ trans('navs.change_password') }}</a>
                                        <a href="{!!route('user.destroy', $user->id)!!}" class="btn btn-danger btn-xs" onclick="return(confirm('Etes-vous sûr ? Cela entrainera à la suppression de tous les profils reliés à ce compte.'))" >{{ trans('labels.delete_user') }}</a>
                                        
                                    </td>
                                </tr>
                            </table>
                        </div><!--tab panel profile-->

                      
                    <div class="tab-pane" id="tab2">
                        <br>
                        @if(isset($info))
                        <div class="row alert alert-success">{{ $info }}</div>
                        @endif
        		        @if(isset($sends))	
        			    <div class="panel panel-default">
        				<div class="panel-heading">Invitations envoyées</div>
        
        				<div class="panel-body">
                           
                        @foreach ($sends as $send)
       					<div>À {{$send->email_to}}, le {{$send->created_at}} pour gérer le profil de {{$send->name_profile}}.
       					@if($send->confirm ==0)
       					{{ trans('labels.en_cours') }}
        				<a href="{!!url('invitations/destroy', $send->id)!!}" class="btn btn-danger btn-xs" onclick="return(confirm('Voulez-vous bien annuler cette invitation ?'))" >{{ trans('labels.cancel') }}</a>
    				    @elseif($send->confirm ==1)
    				    {{ trans('labels.confirmed') }}
    				    @elseif($send->confirm ==2)
    				    {{ trans('labels.refused') }}
    				    @endif
       					
   					    </div>
					    @endforeach
				        </div><!--panel body-->

			            </div><!-- panel -->
            			@endif
            	     	@if(isset($receives))
            			<div class="panel panel-default">
            				<div class="panel-heading">Invitations Reçues</div>
            
            				<div class="panel-body">
            
                                @foreach ($receives as $receive)
                				<div>De {{$receive->email_from }}, le {{$receive->created_at}} pour gérer le profil de {{$receive->name_profile}}.
                				@if($receive->confirm ==0)
                				<a href="{!!url('invitations/accept', $receive->id)!!}" class="btn btn-success btn-xs" onclick="return(confirm('Voulez-vous bien accepter cette invitation ?'))" >{{ trans('labels.accept') }}</a>
                				<a href="{!!url('invitations/refuse', $receive->id)!!}" class="btn btn-danger btn-xs" onclick="return(confirm('Voulez-vous bien refuser cette invitation ?'))" >{{ trans('labels.refuse') }}</a>
            				    @elseif($receive->confirm ==1)
            				    {{ trans('labels.confirmed') }}
            				    @elseif($receive->confirm ==2)
            				    {{ trans('labels.refused') }}
            				    @endif
            				    </div>
            					@endforeach
                                
            				</div><!--panel body-->
            
            			</div><!-- panel -->
            		    @endif 
                         
                         
                        </div><!--tab panel profile-->
                      </div>

                    </div><!--tab panel-->

				</div><!--panel body-->
				
				</div>
				<!--  -->
		   </div>

		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection