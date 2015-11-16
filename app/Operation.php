<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = ['name','op_date','notes'];

	public $timestamps = true;

	public function profile() 
	{
		return $this->belongsTo('App\Profile');
	}
}
