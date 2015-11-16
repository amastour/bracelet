<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
     protected $dates = ['deleted_at'];
    protected $fillable = ['last_name','first_name','gender','birthday','size','weight','color_eye','color_hair','blood','province','city','tel_mobile','tel_home','address','fonction','img','expiration_date','profil_status'];

	public $timestamps = true;

	public function users() 
	{
		return $this->belongsToMany('App\User');
	}

    public function diseases() 
    {
        return $this->hasMany('App\Disease');
    }
    public function relatives() 
    {
        return $this->hasMany('App\Relative');
    }
    public function doctors() 
    {
        return $this->hasMany('App\Doctor');
    }
    public function medicaments() 
    {
        return $this->hasMany('App\Medicament');

    }
    public function operations() 
    {
        return $this->hasMany('App\Operation');
    }
    public function others() 
    {
        return $this->hasMany('App\Other');
    }
    
    public function bracelets() 
    {
    return $this->hasMany('App\Bracelet');
    }

	public function name()

    { 
            return $this->last_name . ' ' . $this->first_name;


    }

   public function calculateAge()
{
	$date=$this->birthday;
    $birthDate = date("d/m/Y", strtotime($date));
    list($day,$month,$year) = explode("/",$birthDate);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($month_diff < 0 || ($year_diff==0 && $day_diff < 0)) $year_diff--;
    else $year_diff;
    return $year_diff;
}
}
