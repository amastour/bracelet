<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['color','size','width','stock_dispo','img_url'];

	public $timestamps = true;

	public function type() 
	{
		return $this->belongsTo('App\Type');
	}
}
