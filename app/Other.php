<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    protected $fillable = ['label','notes'];

	public $timestamps = true;

	public function profile() 
	{
		return $this->belongsTo('App\Profile');
	}
}
