<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    protected $fillable = ['last_name','first_name','relationship','tel_mobile','tel_home','location_geo'];

	public $timestamps = true;

	public function profile() 
	{
		return $this->belongsTo('App\Profile');
	}
}
