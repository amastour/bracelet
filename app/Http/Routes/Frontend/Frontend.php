<?php

/**
 * Frontend Controllers
 */
get('home', ['as' => 'home', 'uses' => 'FrontendController@index']);

get('about', 'FrontendController@about');
get('bracelets', 'BraceletController@present');
get('bracelets/{id}', 'BraceletController@detail');
resource('bracelet/show', 'BraceletController@show');
get('profiles/show/{id}', 'ProfileController@show');

/**
 * These frontend controllers require the user to be logged in
 */
 
Route::group(['middleware' => 'auth'], function ()
{
	//get('dashboard', ['as' => 'frontend.dashboard', 'uses' => 'DashboardController@index']);
	resource('profil', 'ProfilController', ['only' => ['edit', 'update']]);
	resource('profiles/view', 'UserController@index');
	resource('user', 'UserController@destroy');
	resource('profiles/create', 'ProfileController@create');
	get('relatives/create/{id}', 'RelativeController@create');
	get('diseases/create/{id}', 'DiseaseController@create');
	get('medicaments/create/{id}', 'MedicamentController@create');
	get('doctors/create/{id}', 'DoctorController@create');
	get('operations/create/{id}', 'OperationController@create');
	get('others/create/{id}', 'OtherController@create');
	get('invite/{id}', 'InvitationController@create');
	resource('dashboard', 'InvitationController@index');
	resource('invitations/accept', 'InvitationController@accept');
	resource('invitations/refuse', 'InvitationController@refuse');
	resource('invitations/destroy', 'InvitationController@destroy');
	
	

	
	
	get('relatives/edit/{id}', 'RelativeController@edit');
	get('diseases/edit/{id}', 'DiseaseController@edit');
	get('medicaments/edit/{id}', 'MedicamentController@edit');
	get('doctors/edit/{id}', 'DoctorController@edit');
	get('operations/edit/{id}', 'OperationController@edit');
	get('others/edit/{id}', 'OtherController@edit');


	get('profiles/edit/{id}', 'ProfileController@edit');
	get('profiles/link/{id}', 'BraceletController@index');

	
	resource('profiles/deactivate', 'ProfileController@deactivate');
	resource('profiles/activate', 'ProfileController@activate');

	resource('profile', 'ProfileController', ['except' => ['show', 'edit']]);
	resource('relative', 'RelativeController', ['except' => ['show', 'edit']]);
	resource('disease', 'DiseaseController', ['except' => ['show', 'edit']]);
	resource('medicament', 'MedicamentController', ['except' => ['show', 'edit']]);
	resource('doctor', 'DoctorController', ['except' => ['show', 'edit']]);
	resource('operation', 'OperationController', ['except' => ['show', 'edit']]);
	resource('other', 'OtherController', ['except' => ['show', 'edit']]);
	resource('invitation', 'InvitationController', ['except' => ['show','update']]);
	resource('bracelet', 'BraceletController', ['except' => ['show','update']]);

	

});