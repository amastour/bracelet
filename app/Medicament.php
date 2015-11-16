<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    protected $fillable = ['name','notes'];

	public $timestamps = true;

	public function profile() 
	{
		return $this->belongsTo('App\Profile');
	}
}
