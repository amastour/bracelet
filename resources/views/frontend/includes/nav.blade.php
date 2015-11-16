    <nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">{{ trans('labels.toggle_navigation') }}</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="">MID</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>{!! link_to('/home', trans('navs.home')) !!}</li>
					<li>{!! link_to('about', trans('navs.about')) !!}</li>
					<li>{!! link_to('bracelets', trans('navs.bracelet')) !!}</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li>{!! link_to('auth/login', trans('navs.login')) !!}</li>
						<li>{!! link_to('auth/register', trans('navs.register')) !!}</li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::user()->name()}}<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>{!! link_to('profiles/view', trans('navs.manage_profile')) !!}</li>
								<li>{!! link_to('dashboard', trans('navs.account')) !!}</li>
							    <li>{!! link_to('auth/password/change', trans('navs.change_password')) !!}</li>
							    @role('Administrator')
							        {{-- This can also be @role('Administrator') instead --}}
							        <li>{!! link_to_route('backend.dashboard', trans('navs.administration')) !!}</li>
							    @endrole
							    <li class="divider"></li>
								<li>{!! link_to('auth/logout', trans('navs.logout')) !!}</li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>