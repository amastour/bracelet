<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['type','nom','description','price'];

	public $timestamps = true;

	public function bracelets() 
    {
    return $this->hasMany('App\Bracelet');
    }
    
    public function features() 
    {
    return $this->hasMany('App\Feature');
    }
}
