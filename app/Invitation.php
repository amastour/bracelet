<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = ['id_profile','name_profile','id_from','email_from','id_to','email_to','inv_date','invitation_key'];

	public $timestamps = true;

	public function users() 
	{
		return $this->belongsToMany('App\User');
	}
}
