<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phong_Thuy extends Model
{
    //
    protected $table="phong_thuy";
    protected $primaryKey = "id";

	public function nam_phong_thuys()
	{
		return $this->hasMany('App\Nam_Phong_Thuy','phong_thuy_id', 'id');
	}

}
