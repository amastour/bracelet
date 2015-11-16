@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">
            @if(Session::has('success'))
                <div class="alert alert-success text-center">
                    {{ Session::get('success') }}
                </div>
            @endif
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
			
		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection