<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bracelet extends Model
{
    protected $fillable = ['code_id','pin','puk','code_qr','link_date'];

	public $timestamps = true;

	public function profile() 
	{
		return $this->belongsTo('App\Profile');
	}
	
	public function type() 
	{
		return $this->belongsTo('App\Type');
	}
}
